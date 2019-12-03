<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class GenerateHorde extends Command
{
    protected $signature = 'generateHorde {num}';

    public function handle()
    {
        $num = $this->argument('num');
        $len = strlen($num);

        foreach (range(1, $num) as $testNumber) {
            $testNumber = sprintf("%0{$len}d", $testNumber);

            $filename = base_path("tests/Unit/TestHorde/Test{$testNumber}Test.php");
            $source = <<<PHP
<?php

namespace Tests\Unit\TestHorde;

use Tests\TestCase;

class Example{$testNumber}Test extends TestCase
{

PHP;

            foreach (range(1, $num) as $methodNumber) {
                $methodNumber = sprintf("%0{$len}d", $methodNumber);
                $source .= <<<PHP
    public function test$methodNumber(): void
    {
        \$this->assertTrue(true);
    }


PHP;
            }

            $source .= <<<PHP
}
PHP;

            file_put_contents($filename, $source);

        }
    }
}
