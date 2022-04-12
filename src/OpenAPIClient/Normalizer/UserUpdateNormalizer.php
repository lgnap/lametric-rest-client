<?php

namespace LGnap\OpenAPIClient\Normalizer;

use Jane\JsonSchemaRuntime\Reference;
use LGnap\OpenAPIClient\Runtime\Normalizer\CheckArray;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class UserUpdateNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    public function supportsDenormalization($data, $type, $format = null)
    {
        return $type === 'LGnap\\OpenAPIClient\\Model\\UserUpdate';
    }
    public function supportsNormalization($data, $format = null)
    {
        return is_object($data) && get_class($data) === 'LGnap\\OpenAPIClient\\Model\\UserUpdate';
    }
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \LGnap\OpenAPIClient\Model\UserUpdate();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('username', $data) && $data['username'] !== null) {
            $object->setUsername($data['username']);
        } elseif (\array_key_exists('username', $data) && $data['username'] === null) {
            $object->setUsername(null);
        }
        if (\array_key_exists('authKey', $data) && $data['authKey'] !== null) {
            $object->setAuthKey($data['authKey']);
        } elseif (\array_key_exists('authKey', $data) && $data['authKey'] === null) {
            $object->setAuthKey(null);
        }
        if (\array_key_exists('accessToken', $data) && $data['accessToken'] !== null) {
            $object->setAccessToken($data['accessToken']);
        } elseif (\array_key_exists('accessToken', $data) && $data['accessToken'] === null) {
            $object->setAccessToken(null);
        }
        return $object;
    }
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        if (null !== $object->getUsername()) {
            $data['username'] = $object->getUsername();
        }
        if (null !== $object->getAuthKey()) {
            $data['authKey'] = $object->getAuthKey();
        }
        if (null !== $object->getAccessToken()) {
            $data['accessToken'] = $object->getAccessToken();
        }
        return $data;
    }
}
