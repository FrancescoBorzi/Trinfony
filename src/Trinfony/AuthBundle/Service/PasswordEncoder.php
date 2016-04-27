<?php

namespace Trinfony\AuthBundle\Service;

use Symfony\Component\Security\Core\Encoder\PasswordEncoderInterface;

class PasswordEncoder implements PasswordEncoderInterface
{

    public function encodePassword($password, $username)
    {
        return strtoupper(hash('sha1', strtoupper($username) . ':' . strtoupper($password)));
    }

    public function isPasswordValid($encoded, $password, $username)
    {
        return $encoded === $this->encodePassword($password, $username);
    }
}
