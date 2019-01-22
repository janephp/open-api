<?php

namespace Jane\OpenApi\Tests\Expected\Endpoint;

class GetTest extends \Jane\OpenApiRuntime\Client\BaseEndpoint implements \Jane\OpenApiRuntime\Client\Psr7HttplugEndpoint
{
    use \Jane\OpenApiRuntime\Client\Psr7HttplugEndpointTrait;
    function getMethod() : string
    {
        return 'GET';
    }
    function getUri() : string
    {
        return '/test';
    }
    function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, \Http\Message\StreamFactory $streamFactory = null) : array
    {
        return array(array(), null);
    }
    /**
     * {@inheritdoc}
     *
     * @throws \Jane\OpenApi\Tests\Expected\Exception\GetTestBadRequestException
     * @throws \Jane\OpenApi\Tests\Expected\Exception\GetTestNotFoundException
     *
     * @return null|\Jane\OpenApi\Tests\Expected\Model\Schema
     */
    protected function transformResponseBody(string $body, int $status, \Symfony\Component\Serializer\SerializerInterface $serializer)
    {
        if (200 === $status) {
            return $serializer->deserialize($body, 'Jane\\OpenApi\\Tests\\Expected\\Model\\Schema', 'json');
        }
        if (400 === $status) {
            throw new \Jane\OpenApi\Tests\Expected\Exception\GetTestBadRequestException($serializer->deserialize($body, 'Jane\\OpenApi\\Tests\\Expected\\Model\\Error', 'json'));
        }
        if (404 === $status) {
            throw new \Jane\OpenApi\Tests\Expected\Exception\GetTestNotFoundException($serializer->deserialize($body, 'Jane\\OpenApi\\Tests\\Expected\\Model\\Error', 'json'));
        }
    }
}