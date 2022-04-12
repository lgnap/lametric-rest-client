<?php

namespace LGnap\OpenAPIClient\Model;

class UserUpdate
{
    /**
     *
     *
     * @var string|null
     */
    protected $username;
    /**
     *
     *
     * @var string|null
     */
    protected $authKey;
    /**
     *
     *
     * @var string|null
     */
    protected $accessToken;
    /**
     *
     *
     * @return string|null
     */
    public function getUsername(): ?string
    {
        return $this->username;
    }
    /**
     *
     *
     * @param string|null $username
     *
     * @return self
     */
    public function setUsername(?string $username): self
    {
        $this->username = $username;
        return $this;
    }
    /**
     *
     *
     * @return string|null
     */
    public function getAuthKey(): ?string
    {
        return $this->authKey;
    }
    /**
     *
     *
     * @param string|null $authKey
     *
     * @return self
     */
    public function setAuthKey(?string $authKey): self
    {
        $this->authKey = $authKey;
        return $this;
    }
    /**
     *
     *
     * @return string|null
     */
    public function getAccessToken(): ?string
    {
        return $this->accessToken;
    }
    /**
     *
     *
     * @param string|null $accessToken
     *
     * @return self
     */
    public function setAccessToken(?string $accessToken): self
    {
        $this->accessToken = $accessToken;
        return $this;
    }
}
