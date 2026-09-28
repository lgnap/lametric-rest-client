<?php

namespace LGnap\OpenAPIClient\Normalizer;

use LGnap\OpenAPIClient\Runtime\Normalizer\CheckArray;
use LGnap\OpenAPIClient\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class JaneObjectNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    protected $normalizers = [

        \LGnap\OpenAPIClient\Model\ScreenUpdate::class => \LGnap\OpenAPIClient\Normalizer\ScreenUpdateNormalizer::class,

        \LGnap\OpenAPIClient\Model\Screen::class => \LGnap\OpenAPIClient\Normalizer\ScreenNormalizer::class,

        \LGnap\OpenAPIClient\Model\DeviceUpdate::class => \LGnap\OpenAPIClient\Normalizer\DeviceUpdateNormalizer::class,

        \LGnap\OpenAPIClient\Model\Device::class => \LGnap\OpenAPIClient\Normalizer\DeviceNormalizer::class,

        \LGnap\OpenAPIClient\Model\UserUpdate::class => \LGnap\OpenAPIClient\Normalizer\UserUpdateNormalizer::class,

        \LGnap\OpenAPIClient\Model\ItemCreation::class => \LGnap\OpenAPIClient\Normalizer\ItemCreationNormalizer::class,

        \LGnap\OpenAPIClient\Model\User::class => \LGnap\OpenAPIClient\Normalizer\UserNormalizer::class,

        \LGnap\OpenAPIClient\Model\Error::class => \LGnap\OpenAPIClient\Normalizer\ErrorNormalizer::class,

        \LGnap\OpenAPIClient\Model\ErrorValidationItem::class => \LGnap\OpenAPIClient\Normalizer\ErrorValidationItemNormalizer::class,

        \LGnap\OpenAPIClient\Model\ResponseFrameList::class => \LGnap\OpenAPIClient\Normalizer\ResponseFrameListNormalizer::class,

        \Jane\Component\JsonSchemaRuntime\Reference::class => \LGnap\OpenAPIClient\Runtime\Normalizer\ReferenceNormalizer::class,
    ];
    protected $normalizersCache = [];
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return array_key_exists($type, $this->normalizers);
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && array_key_exists(get_class($data), $this->normalizers);
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $normalizerClass = $this->normalizers[get_class($data)];
        $normalizer = $this->getNormalizer($normalizerClass);
        return $normalizer->normalize($data, $format, $context);
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $denormalizerClass = $this->normalizers[$type];
        $denormalizer = $this->getNormalizer($denormalizerClass);
        return $denormalizer->denormalize($data, $type, $format, $context);
    }
    private function getNormalizer(string $normalizerClass)
    {
        return $this->normalizersCache[$normalizerClass] ?? $this->initNormalizer($normalizerClass);
    }
    private function initNormalizer(string $normalizerClass)
    {
        $normalizer = new $normalizerClass();
        $normalizer->setNormalizer($this->normalizer);
        $normalizer->setDenormalizer($this->denormalizer);
        $this->normalizersCache[$normalizerClass] = $normalizer;
        return $normalizer;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return array_combine(array_keys($this->normalizers), array_fill(0, count($this->normalizers), false));
    }
}
