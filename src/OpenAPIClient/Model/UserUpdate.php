<?php

namespace LGnap\OpenAPIClient\Model;

use LGnap\OpenAPIClient\Runtime\AdditionalAndPatternProperties;
use LGnap\OpenAPIClient\Runtime\AdditionalPropertiesInterface;

class UserUpdate implements AdditionalPropertiesInterface
{
    use AdditionalAndPatternProperties;
    /**
     * @var array
     */
    protected $initialized = [];
    public function isInitialized($property): bool
    {
        return array_key_exists($property, $this->initialized);
    }
    /**
     * @var string|null
     */
    protected $username;
    /**
     * @var string|null
     */
    protected $authKey;
    /**
     * @var string|null
     */
    protected $accessToken;
    /**
     * @return string|null
     */
    public function getUsername(): ?string
    {
        return $this->username;
    }
    /**
     * @param string|null $username
     *
     * @return self
     */
    public function setUsername(?string $username): self
    {
        $this->initialized['username'] = true;
        $this->username = $username;
        return $this;
    }
    /**
     * @return string|null
     */
    public function getAuthKey(): ?string
    {
        return $this->authKey;
    }
    /**
     * @param string|null $authKey
     *
     * @return self
     */
    public function setAuthKey(?string $authKey): self
    {
        $this->initialized['authKey'] = true;
        $this->authKey = $authKey;
        return $this;
    }
    /**
     * @return string|null
     */
    public function getAccessToken(): ?string
    {
        return $this->accessToken;
    }
    /**
     * @param string|null $accessToken
     *
     * @return self
     */
    public function setAccessToken(?string $accessToken): self
    {
        $this->initialized['accessToken'] = true;
        $this->accessToken = $accessToken;
        return $this;
    }
    public function definedProperties(): array
    {
        return ['username' => ['username', 'getUsername', 'setUsername'], 'authKey' => ['authKey', 'getAuthKey', 'setAuthKey'], 'accessToken' => ['accessToken', 'getAccessToken', 'setAccessToken']];
    }
}
