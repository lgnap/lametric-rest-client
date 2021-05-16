<?php

namespace LGnap\OpenAPIClient\Model;

class User
{
    /**
     *
     *
     * @var string
     */
    protected $username;
    /**
     *
     *
     * @var string
     */
    protected $authKey;
    /**
     *
     *
     * @var string
     */
    protected $accessToken;
    /**
     *
     *
     * @var int
     */
    protected $id;
    /**
     *
     *
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }
    /**
     *
     *
     * @param string $username
     *
     * @return self
     */
    public function setUsername(string $username): self
    {
        $this->username = $username;
        return $this;
    }
    /**
     *
     *
     * @return string
     */
    public function getAuthKey(): string
    {
        return $this->authKey;
    }
    /**
     *
     *
     * @param string $authKey
     *
     * @return self
     */
    public function setAuthKey(string $authKey): self
    {
        $this->authKey = $authKey;
        return $this;
    }
    /**
     *
     *
     * @return string
     */
    public function getAccessToken(): string
    {
        return $this->accessToken;
    }
    /**
     *
     *
     * @param string $accessToken
     *
     * @return self
     */
    public function setAccessToken(string $accessToken): self
    {
        $this->accessToken = $accessToken;
        return $this;
    }
    /**
     *
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
    /**
     *
     *
     * @param int $id
     *
     * @return self
     */
    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }
}
