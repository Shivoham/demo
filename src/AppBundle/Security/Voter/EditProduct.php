<?php

namespace AppBundle\Security\Voter;

use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use AppBundle\Entity\Product;
use AppBundle\Entity\User;
use Symfony\Component\Security\Core\Authorization\Voter\VoterInterface;

class EditProduct implements VoterInterface
{
    public function vote(TokenInterface $token, $subject, array $attributes)
    {
        if (!in_array('EDIT', $attributes)) {
            return self::ACCESS_ABSTAIN;
        }

        if (!$subject instanceof Product) {
            return self::ACCESS_ABSTAIN;
        }

        if (null === $user = $token->getUser()) {
            return self::ACCESS_DENIED;
        }

        if ($subject->getOwner() !== $user) {
            return self::ACCESS_DENIED;
        }

        return self::ACCESS_GRANTED;
    }
}
