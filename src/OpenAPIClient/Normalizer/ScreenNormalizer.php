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

class ScreenNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    public function supportsDenormalization($data, $type, $format = null)
    {
        return $type === 'LGnap\\OpenAPIClient\\Model\\Screen';
    }
    public function supportsNormalization($data, $format = null)
    {
        return is_object($data) && get_class($data) === 'LGnap\\OpenAPIClient\\Model\\Screen';
    }
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \LGnap\OpenAPIClient\Model\Screen();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('icon', $data)) {
            $object->setIcon($data['icon']);
        }
        if (\array_key_exists('text', $data)) {
            $object->setText($data['text']);
        }
        if (\array_key_exists('id', $data)) {
            $object->setId($data['id']);
        }
        return $object;
    }
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        $data['icon'] = $object->getIcon();
        $data['text'] = $object->getText();
        $data['id'] = $object->getId();
        return $data;
    }
}
