<?php

namespace Tests\Unit\Rule;

use App\Rules\EvenNumberRule;
use Illuminate\Validation\Rule;
use Tests\TestCase;

class EvenNumberRuleTest extends TestCase
{
    /**
     * @var EvenNumberRule
     */
    protected $rule;

    public function setUp()
    {
        parent::setUp();

        $this->rule = new EvenNumberRule();
    }

    /**
     * Test that the Rule macro has been applied and returns the correct rule.
     */
    public function testEvenNumbersMacro()
    {
        $this->assertInstanceOf(EvenNumberRule::class, Rule::even());
    }

    /**
     * Check that the even number passes
     *
     * @dataProvider evenNumbers
     * @param int|float $number
     * @return void
     */
    public function testEvenNumbersPass($number)
    {
        $this->assertTrue($this->rule->passes('test', $number));
    }

    /**
     * Check that the odd numbers fail
     *
     * @dataProvider oddNumbers
     * @param int|float $number
     * @return void
     */
    public function testOddNumbersFail($number)
    {
        $this->assertFalse($this->rule->passes('test', $number));
    }

    public function evenNumbers()
    {
        return [
            [-100],
            [-2],
            [-2.1],
            [-2.2],
            [0],
            [2],
            [100],
            [2.1],
            [2.2],
        ];
    }

    public function oddNumbers()
    {
        return [
            [-101],
            [-1],
            [-1.1],
            [-1.2],
            [1],
            [101],
            [1.1],
            [1.2],
        ];
    }
}
