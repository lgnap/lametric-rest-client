<?php

namespace LGnap\OpenAPIClient\Normalizer;

use LGnap\OpenAPIClient\Runtime\Normalizer\CheckArray;
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
    protected $normalizers = array('LGnap\\OpenAPIClient\\Model\\ScreenUpdate' => 'LGnap\\OpenAPIClient\\Normalizer\\ScreenUpdateNormalizer', 'LGnap\\OpenAPIClient\\Model\\Screen' => 'LGnap\\OpenAPIClient\\Normalizer\\ScreenNormalizer', 'LGnap\\OpenAPIClient\\Model\\DeviceUpdate' => 'LGnap\\OpenAPIClient\\Normalizer\\DeviceUpdateNormalizer', 'LGnap\\OpenAPIClient\\Model\\Device' => 'LGnap\\OpenAPIClient\\Normalizer\\DeviceNormalizer', 'LGnap\\OpenAPIClient\\Model\\UserUpdate' => 'LGnap\\OpenAPIClient\\Normalizer\\UserUpdateNormalizer', 'LGnap\\OpenAPIClient\\Model\\ItemCreation' => 'LGnap\\OpenAPIClient\\Normalizer\\ItemCreationNormalizer', 'LGnap\\OpenAPIClient\\Model\\User' => 'LGnap\\OpenAPIClient\\Normalizer\\UserNormalizer', 'LGnap\\OpenAPIClient\\Model\\Error' => 'LGnap\\OpenAPIClient\\Normalizer\\ErrorNormalizer', 'LGnap\\OpenAPIClient\\Model\\ResponseFrameList' => 'LGnap\\OpenAPIClient\\Normalizer\\ResponseFrameListNormalizer', '\\Jane\\JsonSchemaRuntime\\Reference' => '\\LGnap\\OpenAPIClient\\Runtime\\Normalizer\\ReferenceNormalizer');
    protected $normalizersCache = array();
    public function supportsDenormalization($data, $type, $format = null)
    {
        return array_key_exists($type, $this->normalizers);
    }
    public function supportsNormalization($data, $format = null)
    {
        return is_object($data) && array_key_exists(get_class($data), $this->normalizers);
    }
    public function normalize($object, $format = null, array $context = array())
    {
        $normalizerClass = $this->normalizers[get_class($object)];
        $normalizer = $this->getNormalizer($normalizerClass);
        return $normalizer->normalize($object, $format, $context);
    }
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        $denormalizerClass = $this->normalizers[$class];
        $denormalizer = $this->getNormalizer($denormalizerClass);
        return $denormalizer->denormalize($data, $class, $format, $context);
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
}
