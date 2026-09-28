<?php

namespace LGnap\OpenAPIClient\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use LGnap\OpenAPIClient\Runtime\Normalizer\CheckArray;
use LGnap\OpenAPIClient\Runtime\Normalizer\ValidatorTrait;
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
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \LGnap\OpenAPIClient\Model\UserUpdate::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \LGnap\OpenAPIClient\Model\UserUpdate::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \LGnap\OpenAPIClient\Model\UserUpdate();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('username', $data) && $data['username'] !== null) {
            $object->setUsername($data['username']);
            unset($data['username']);
        } elseif (\array_key_exists('username', $data) && $data['username'] === null) {
            $object->setUsername(null);
            unset($data['username']);
        }
        if (\array_key_exists('authKey', $data) && $data['authKey'] !== null) {
            $object->setAuthKey($data['authKey']);
            unset($data['authKey']);
        } elseif (\array_key_exists('authKey', $data) && $data['authKey'] === null) {
            $object->setAuthKey(null);
            unset($data['authKey']);
        }
        if (\array_key_exists('accessToken', $data) && $data['accessToken'] !== null) {
            $object->setAccessToken($data['accessToken']);
            unset($data['accessToken']);
        } elseif (\array_key_exists('accessToken', $data) && $data['accessToken'] === null) {
            $object->setAccessToken(null);
            unset($data['accessToken']);
        }
        foreach ($data as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $object[$key] = $value;
            }
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if ($data->isInitialized('username') && null !== $data->getUsername()) {
            $dataArray['username'] = $data->getUsername();
        }
        if ($data->isInitialized('authKey') && null !== $data->getAuthKey()) {
            $dataArray['authKey'] = $data->getAuthKey();
        }
        if ($data->isInitialized('accessToken') && null !== $data->getAccessToken()) {
            $dataArray['accessToken'] = $data->getAccessToken();
        }
        foreach ($data->additionalPropertyEntries() as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $dataArray[$key] = $value;
            }
        }
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\LGnap\OpenAPIClient\Model\UserUpdate::class => false];
    }
}
