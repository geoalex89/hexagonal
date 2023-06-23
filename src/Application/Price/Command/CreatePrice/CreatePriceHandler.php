<?php

declare(strict_types=1);

namespace Hexagonal\Application\Price\Command\CreatePrice;

use Hexagonal\Domain\Partner\Repository\PartnerRepository;
use Hexagonal\Domain\Partner\Room;
use Hexagonal\Domain\Partner\VO\PartnerId;
use Hexagonal\Domain\Price\Exception\PriceException;
use Hexagonal\Domain\Price\Model\Price;
use Hexagonal\Domain\Price\Repository\PriceRepository;
use Hexagonal\Domain\Price\Repository\RoomRepository;
use Hexagonal\Domain\Price\VO\DayValueCollection;
use Hexagonal\Domain\Price\VO\Month;
use Hexagonal\Domain\Price\VO\Period;
use Hexagonal\Domain\Price\VO\PriceId;
use Hexagonal\Domain\Price\VO\Year;
use Hexagonal\Domain\Shared\Collection\InvalidCollectionException;
use Hexagonal\Domain\Shared\Exception\InvalidSharedException;
use Hexagonal\Domain\Shared\ValueObject\Audit;

class CreatePriceHandler
{
    public function __construct(
        private readonly PartnerRepository $partnerRepository,
        private readonly RoomRepository $roomRepository,
        private readonly PriceRepository $priceRepository,
    ) {
    }

    /** @throws PriceException|InvalidCollectionException|InvalidSharedException */
    public function __invoke(CreatePriceCommand $command): void
    {
        $partner = $this->partnerRepository->findByIdAndActive(PartnerId::create($command->partnerId()));
        $rooms = $this->roomRepository->findByPartnerId($partner->id());
        // scaffolding months iteration;
        $period = new Period(
            Year::create(intval($command->starDate->format('Y'))),
            Month::create(intval($command->starDate->format('m'))),
            DayValueCollection::create([])
        );
        /** @var Room $room */
        foreach ($rooms->getIterator() as $room) {
            $price = $this->priceRepository->findRoomIdAndPeriod($room->id(), $period);
            if (!$price instanceof Price) {
                new Price(PriceId::create(), $room->id(), $period, Audit::create());
            }
            // Todo: Implementation priceCalculation creating the dayValue comparing if not are equal and later fill the collection and save it.
            $this->priceRepository->store($price);
        }
    }
}