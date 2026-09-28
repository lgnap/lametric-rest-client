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

class ResponseFrameListNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \LGnap\OpenAPIClient\Model\ResponseFrameList::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \LGnap\OpenAPIClient\Model\ResponseFrameList::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \LGnap\OpenAPIClient\Model\ResponseFrameList();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('frames', $data)) {
            $values = [];
            foreach ($data['frames'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, \LGnap\OpenAPIClient\Model\Screen::class, 'json', $context);
            }
            $object->setFrames($values);
            unset($data['frames']);
        }
        foreach ($data as $key => $value_1) {
            if (preg_match('/.*/', (string) $key)) {
                $object[$key] = $value_1;
            }
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if ($data->isInitialized('frames') && null !== $data->getFrames()) {
            $values = [];
            foreach ($data->getFrames() as $value) {
                $values[] = $value === null ? null : new \LGnap\OpenAPIClient\Runtime\JsonObject($this->normalizer->normalize($value, 'json', $context));
            }
            $dataArray['frames'] = $values;
        }
        foreach ($data->additionalPropertyEntries() as $key => $value_1) {
            if (preg_match('/.*/', (string) $key)) {
                $dataArray[$key] = $value_1;
            }
        }
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\LGnap\OpenAPIClient\Model\ResponseFrameList::class => false];
    }
}
