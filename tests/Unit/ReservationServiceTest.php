<?php

namespace Tests\Unit;

use App\Models\Customer;
use App\Models\Table;
use App\Services\ReservationService;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;


class ReservationServiceTest extends TestCase
{
    use RefreshDatabase;

    protected $reservationService;

    protected function setUp(): void
    {
        $this->reservationService = app()->make(ReservationService::class);
        parent::setUp();
    }

    /** @test */
    public function it_can_create_reservation()
    {
        $table = Table::factory()->create();
        $customer = Customer::factory()->create();

        $this->reservationService->create(
            [
                'table_id' => $table->id,
                'customer_id' => $customer->id,
                'from_time' => Carbon::now(),
                'to_time' => Carbon::now()->addHour()
            ]
        );

        $this->assertDatabaseHas(
            'reservations',
            [
                'table_id' => $table->id,
                'customer_id' => $customer->id,
                'from_time' => Carbon::now(),
                'to_time' => Carbon::now()->addHour()
            ]
        );
    }

    /** @test */
    public function it_can_return_true_if_guest_number_greater_than_table_capacity()
    {
        $table = Table::factory()->create(['capacity' => 2]);

        $result = $this->reservationService->checkTableCapacity($table->id, 4);

        $this->assertTrue($result);
    }

    /** @test */
    public function it_can_return_false_if_guest_number_greater_than_table_capacity()
    {
        $table = Table::factory()->create(['capacity' => 5]);

        $result = $this->reservationService->checkTableCapacity($table->id, 4);

        $this->assertFalse($result);
    }

    /** @test */
    public function it_can_put_reservation_on_wait_list()
    {
        $customer = Customer::factory()->create();
        Table::factory()->create(['capacity' => 1]);
        $table2 = Table::factory()->create(['capacity' => 8]);
        $guestNumbers = 5;
        $to_time = Carbon::now()->addHour();
        $from_time = Carbon::now();

        $result = $this->reservationService->putOnWaitList(
            [
                'customer_id' => $customer->id,
                'from_time' => $to_time,
                'to_time' => $from_time,
                'guest_number' => $guestNumbers
            ]
        );

        $this->assertDatabaseHas(
            'wait_lists',
            [
                'table_id' => $table2->id,
                'customer_id' => $customer->id,
                'preferred_from_date' => $to_time,
                'preferred_to_date' => $from_time,
                'number_of_guests' => $guestNumbers,
            ]
        );
    }
}
