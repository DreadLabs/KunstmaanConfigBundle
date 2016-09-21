<?php

/*
 * This file is part of the `DreadLabs/KunstmaanConfigBundle` project.
 *
 * (c) https://github.com/DreadLabs/KunstmaanConfigBundle/graphs/contributors
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace DreadLabs\KunstmaanConfigBundle\Tests\DependencyInjection;

use DreadLabs\KunstmaanConfigBundle\DependencyInjection\Configuration;
use Matthias\SymfonyConfigTest\PhpUnit\ConfigurationTestCaseTrait;

class ConfigurationTest extends \PHPUnit_Framework_TestCase
{
    use ConfigurationTestCaseTrait;

    protected function getConfiguration()
    {
        return new Configuration();
    }

    /**
     * @test
     */
    public function theDefaultValueOfTheMediaFilesystemAdapterPath()
    {
        $this->assertProcessedConfigurationEquals(
            [[]],
            [
                'media' => [
                    'filesystem_adapter' => [
                        'path' => '%liipimagine_webroot%%kunstmaan_media.media_path%',
                    ],
                ],
            ]
        );
    }
}
