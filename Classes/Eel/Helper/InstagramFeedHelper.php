<?php

namespace Visol\Neos\InstagramFeed\Eel\Helper;

/*
 * This file is part of the Visol.Neos.InstagramFeedHelper package.
 */

use Neos\Flow\Annotations as Flow;
use Neos\Eel\ProtectedContextAwareInterface;

class InstagramFeedHelper implements ProtectedContextAwareInterface
{
    /**
     * @var string
     * @Flow\InjectConfiguration(path="accessToken")
     */
    protected $accessToken;

    /**
     * @Flow\Inject
     * @var \Neos\Flow\Http\Client\Browser
     */
    protected $browser;

    /**
     * @Flow\Inject
     * @var \Neos\Flow\Http\Client\CurlEngine
     */
    protected $browserRequestEngine;

    /**
     * @return array
     */
    public function recentMedia()
    {
        $uri = sprintf('https://api.instagram.com/v1/users/self/media/recent?access_token=%s', $this->accessToken);
        $this->browser->setRequestEngine($this->browserRequestEngine);
        $response = $this->browser->request($uri);
        if ($response->getStatusCode() === 200) {
            $result = json_decode($response->getContent(), true);
            if (array_key_exists('data', $result)) {
                return $result['data'];
            }
            return [];
        } else {
            return [];
        }
    }

    /**
     * All methods are considered safe, i.e. can be executed from within Eel
     *
     * @param string $methodName
     * @return boolean
     */
    public function allowsCallOfMethod($methodName)
    {
        return true;
    }
}
