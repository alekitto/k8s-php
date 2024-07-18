<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\ApiExtensions\v1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;
use Kcs\K8s\Collection;

/**
 * JSONSchemaProps is a JSON-Schema following Specification Draft 4 (http://json-schema.org/).
 */
class JSONSchemaProps
{
    #[Kubernetes\Attribute('$ref')]
    protected string|null $ref = null;

    #[Kubernetes\Attribute('$schema')]
    protected string|null $schema = null;

    #[Kubernetes\Attribute('additionalItems')]
    protected string|null $additionalItems = null;

    #[Kubernetes\Attribute('additionalProperties')]
    protected string|null $additionalProperties = null;

    /** @var iterable|JSONSchemaProps[]|null */
    #[Kubernetes\Attribute(
        'allOf',
        type: AttributeType::Collection,
        model: self::class,
    )]
    protected $allOf = null;

    /** @var iterable|JSONSchemaProps[]|null */
    #[Kubernetes\Attribute(
        'anyOf',
        type: AttributeType::Collection,
        model: self::class,
    )]
    protected $anyOf = null;

    #[Kubernetes\Attribute('default')]
    protected string|null $default = null;

    /** @var object[]|null */
    #[Kubernetes\Attribute('definitions')]
    protected array|null $definitions = null;

    /** @var object[]|null */
    #[Kubernetes\Attribute('dependencies')]
    protected array|null $dependencies = null;

    #[Kubernetes\Attribute('description')]
    protected string|null $description = null;

    /** @var string[]|null */
    #[Kubernetes\Attribute('enum')]
    protected array|null $enum = null;

    #[Kubernetes\Attribute('example')]
    protected string|null $example = null;

    #[Kubernetes\Attribute('exclusiveMaximum')]
    protected bool|null $exclusiveMaximum = null;

    #[Kubernetes\Attribute('exclusiveMinimum')]
    protected bool|null $exclusiveMinimum = null;

    #[Kubernetes\Attribute('externalDocs', type: AttributeType::Model, model: ExternalDocumentation::class)]
    protected ExternalDocumentation|null $externalDocs = null;

    #[Kubernetes\Attribute('format')]
    protected string|null $format = null;

    #[Kubernetes\Attribute('id')]
    protected string|null $id = null;

    #[Kubernetes\Attribute('items')]
    protected string|null $items = null;

    #[Kubernetes\Attribute('maxItems')]
    protected int|null $maxItems = null;

    #[Kubernetes\Attribute('maxLength')]
    protected int|null $maxLength = null;

    #[Kubernetes\Attribute('maxProperties')]
    protected int|null $maxProperties = null;

    #[Kubernetes\Attribute('maximum')]
    protected mixed $maximum = null;

    #[Kubernetes\Attribute('minItems')]
    protected int|null $minItems = null;

    #[Kubernetes\Attribute('minLength')]
    protected int|null $minLength = null;

    #[Kubernetes\Attribute('minProperties')]
    protected int|null $minProperties = null;

    #[Kubernetes\Attribute('minimum')]
    protected mixed $minimum = null;

    #[Kubernetes\Attribute('multipleOf')]
    protected mixed $multipleOf = null;

    #[Kubernetes\Attribute('not', type: AttributeType::Model, model: self::class)]
    protected JSONSchemaProps|null $not = null;

    #[Kubernetes\Attribute('nullable')]
    protected bool|null $nullable = null;

    /** @var iterable|JSONSchemaProps[]|null */
    #[Kubernetes\Attribute(
        'oneOf',
        type: AttributeType::Collection,
        model: self::class,
    )]
    protected $oneOf = null;

    #[Kubernetes\Attribute('pattern')]
    protected string|null $pattern = null;

    /** @var object[]|null */
    #[Kubernetes\Attribute('patternProperties')]
    protected array|null $patternProperties = null;

    /** @var object[]|null */
    #[Kubernetes\Attribute('properties')]
    protected array|null $properties = null;

    /** @var string[]|null */
    #[Kubernetes\Attribute('required')]
    protected array|null $required = null;

    #[Kubernetes\Attribute('title')]
    protected string|null $title = null;

    #[Kubernetes\Attribute('type')]
    protected string|null $type = null;

    #[Kubernetes\Attribute('uniqueItems')]
    protected bool|null $uniqueItems = null;

    #[Kubernetes\Attribute('x-kubernetes-embedded-resource')]
    protected bool|null $xKubernetesEmbeddedResource = null;

    #[Kubernetes\Attribute('x-kubernetes-int-or-string')]
    protected bool|null $xKubernetesIntOrString = null;

    /** @var string[]|null */
    #[Kubernetes\Attribute('x-kubernetes-list-map-keys')]
    protected array|null $xKubernetesListMapKeys = null;

    #[Kubernetes\Attribute('x-kubernetes-list-type')]
    protected string|null $xKubernetesListType = null;

    #[Kubernetes\Attribute('x-kubernetes-map-type')]
    protected string|null $xKubernetesMapType = null;

    #[Kubernetes\Attribute('x-kubernetes-preserve-unknown-fields')]
    protected bool|null $xKubernetesPreserveUnknownFields = null;

    /** @var iterable|ValidationRule[]|null */
    #[Kubernetes\Attribute('x-kubernetes-validations', type: AttributeType::Collection, model: ValidationRule::class)]
    protected $xKubernetesValidations = null;

    public function getRef(): string|null
    {
        return $this->ref;
    }

    /** @return static */
    public function setRef(string $ref): static
    {
        $this->ref = $ref;

        return $this;
    }

    public function getSchema(): string|null
    {
        return $this->schema;
    }

    /** @return static */
    public function setSchema(string $schema): static
    {
        $this->schema = $schema;

        return $this;
    }

    public function getAdditionalItems(): string
    {
        return $this->additionalItems;
    }

    /** @return static */
    public function setAdditionalItems(string $additionalItems): static
    {
        $this->additionalItems = $additionalItems;

        return $this;
    }

    public function getAdditionalProperties(): string
    {
        return $this->additionalProperties;
    }

    /** @return static */
    public function setAdditionalProperties(string $additionalProperties): static
    {
        $this->additionalProperties = $additionalProperties;

        return $this;
    }

    /** @return iterable|JSONSchemaProps[] */
    public function getAllOf(): iterable|null
    {
        return $this->allOf;
    }

    /** @return static */
    public function setAllOf(iterable $allOf): static
    {
        $this->allOf = $allOf;

        return $this;
    }

    /** @return static */
    public function addAllOf(JSONSchemaProps $allOf): static
    {
        if (! $this->allOf) {
            $this->allOf = new Collection();
        }

        $this->allOf[] = $allOf;

        return $this;
    }

    /** @return iterable|JSONSchemaProps[] */
    public function getAnyOf(): iterable|null
    {
        return $this->anyOf;
    }

    /** @return static */
    public function setAnyOf(iterable $anyOf): static
    {
        $this->anyOf = $anyOf;

        return $this;
    }

    /** @return static */
    public function addAnyOf(JSONSchemaProps $anyOf): static
    {
        if (! $this->anyOf) {
            $this->anyOf = new Collection();
        }

        $this->anyOf[] = $anyOf;

        return $this;
    }

    /**
     * default is a default value for undefined object fields. Defaulting is a beta feature under the
     * CustomResourceDefaulting feature gate. Defaulting requires spec.preserveUnknownFields to be false.
     */
    public function getDefault(): string
    {
        return $this->default;
    }

    /**
     * default is a default value for undefined object fields. Defaulting is a beta feature under the
     * CustomResourceDefaulting feature gate. Defaulting requires spec.preserveUnknownFields to be false.
     *
     * @return static
     */
    public function setDefault(string $default): static
    {
        $this->default = $default;

        return $this;
    }

    public function getDefinitions(): array|null
    {
        return $this->definitions;
    }

    /** @return static */
    public function setDefinitions(array $definitions): static
    {
        $this->definitions = $definitions;

        return $this;
    }

    public function getDependencies(): array|null
    {
        return $this->dependencies;
    }

    /** @return static */
    public function setDependencies(array $dependencies): static
    {
        $this->dependencies = $dependencies;

        return $this;
    }

    public function getDescription(): string|null
    {
        return $this->description;
    }

    /** @return static */
    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    /** @return string[] */
    public function getEnum(): array
    {
        return $this->enum;
    }

    /**
     * @param string[] $enum
     *
     * @return static
     */
    public function setEnum(array $enum): static
    {
        $this->enum = $enum;

        return $this;
    }

    public function getExample(): string
    {
        return $this->example;
    }

    /** @return static */
    public function setExample(string $example): static
    {
        $this->example = $example;

        return $this;
    }

    public function isExclusiveMaximum(): bool|null
    {
        return $this->exclusiveMaximum;
    }

    /** @return static */
    public function setIsExclusiveMaximum(bool $exclusiveMaximum): static
    {
        $this->exclusiveMaximum = $exclusiveMaximum;

        return $this;
    }

    public function isExclusiveMinimum(): bool|null
    {
        return $this->exclusiveMinimum;
    }

    /** @return static */
    public function setIsExclusiveMinimum(bool $exclusiveMinimum): static
    {
        $this->exclusiveMinimum = $exclusiveMinimum;

        return $this;
    }

    public function getExternalDocs(): ExternalDocumentation|null
    {
        return $this->externalDocs;
    }

    /** @return static */
    public function setExternalDocs(ExternalDocumentation $externalDocs): static
    {
        $this->externalDocs = $externalDocs;

        return $this;
    }

    /**
     * format is an OpenAPI v3 format string. Unknown formats are ignored. The following formats are
     * validated:
     *
     * - bsonobjectid: a bson object ID, i.e. a 24 characters hex string - uri: an URI as parsed by Golang
     * net/url.ParseRequestURI - email: an email address as parsed by Golang net/mail.ParseAddress -
     * hostname: a valid representation for an Internet host name, as defined by RFC 1034, section 3.1
     * [RFC1034]. - ipv4: an IPv4 IP as parsed by Golang net.ParseIP - ipv6: an IPv6 IP as parsed by Golang
     * net.ParseIP - cidr: a CIDR as parsed by Golang net.ParseCIDR - mac: a MAC address as parsed by
     * Golang net.ParseMAC - uuid: an UUID that allows uppercase defined by the regex
     * (?i)^[0-9a-f]{8}-?[0-9a-f]{4}-?[0-9a-f]{4}-?[0-9a-f]{4}-?[0-9a-f]{12}$ - uuid3: an UUID3 that allows
     * uppercase defined by the regex
     * (?i)^[0-9a-f]{8}-?[0-9a-f]{4}-?3[0-9a-f]{3}-?[0-9a-f]{4}-?[0-9a-f]{12}$ - uuid4: an UUID4 that
     * allows uppercase defined by the regex
     * (?i)^[0-9a-f]{8}-?[0-9a-f]{4}-?4[0-9a-f]{3}-?[89ab][0-9a-f]{3}-?[0-9a-f]{12}$ - uuid5: an UUID5 that
     * allows uppercase defined by the regex
     * (?i)^[0-9a-f]{8}-?[0-9a-f]{4}-?5[0-9a-f]{3}-?[89ab][0-9a-f]{3}-?[0-9a-f]{12}$ - isbn: an ISBN10 or
     * ISBN13 number string like "0321751043" or "978-0321751041" - isbn10: an ISBN10 number string like
     * "0321751043" - isbn13: an ISBN13 number string like "978-0321751041" - creditcard: a credit card
     * number defined by the regex
     * ^(?:4[0-9]{12}(?:[0-9]{3})?|5[1-5][0-9]{14}|6(?:011|5[0-9][0-9])[0-9]{12}|3[47][0-9]{13}|3(?:0[0-5]|[68][0-9])[0-9]{11}|(?:2131|1800|35\d{3})\d{11})$
     * with any non digit characters mixed in - ssn: a U.S. social security number following the regex
     * ^\d{3}[- ]?\d{2}[- ]?\d{4}$ - hexcolor: an hexadecimal color code like "#FFFFFF: following the regex
     * ^#?([0-9a-fA-F]{3}|[0-9a-fA-F]{6})$ - rgbcolor: an RGB color code like rgb like "rgb(255,255,2559" -
     * byte: base64 encoded binary data - password: any kind of string - date: a date string like
     * "2006-01-02" as defined by full-date in RFC3339 - duration: a duration string like "22 ns" as parsed
     * by Golang time.ParseDuration or compatible with Scala duration format - datetime: a date time string
     * like "2014-12-15T19:30:20.000Z" as defined by date-time in RFC3339.
     */
    public function getFormat(): string|null
    {
        return $this->format;
    }

    /**
     * format is an OpenAPI v3 format string. Unknown formats are ignored. The following formats are
     * validated:
     *
     * - bsonobjectid: a bson object ID, i.e. a 24 characters hex string - uri: an URI as parsed by Golang
     * net/url.ParseRequestURI - email: an email address as parsed by Golang net/mail.ParseAddress -
     * hostname: a valid representation for an Internet host name, as defined by RFC 1034, section 3.1
     * [RFC1034]. - ipv4: an IPv4 IP as parsed by Golang net.ParseIP - ipv6: an IPv6 IP as parsed by Golang
     * net.ParseIP - cidr: a CIDR as parsed by Golang net.ParseCIDR - mac: a MAC address as parsed by
     * Golang net.ParseMAC - uuid: an UUID that allows uppercase defined by the regex
     * (?i)^[0-9a-f]{8}-?[0-9a-f]{4}-?[0-9a-f]{4}-?[0-9a-f]{4}-?[0-9a-f]{12}$ - uuid3: an UUID3 that allows
     * uppercase defined by the regex
     * (?i)^[0-9a-f]{8}-?[0-9a-f]{4}-?3[0-9a-f]{3}-?[0-9a-f]{4}-?[0-9a-f]{12}$ - uuid4: an UUID4 that
     * allows uppercase defined by the regex
     * (?i)^[0-9a-f]{8}-?[0-9a-f]{4}-?4[0-9a-f]{3}-?[89ab][0-9a-f]{3}-?[0-9a-f]{12}$ - uuid5: an UUID5 that
     * allows uppercase defined by the regex
     * (?i)^[0-9a-f]{8}-?[0-9a-f]{4}-?5[0-9a-f]{3}-?[89ab][0-9a-f]{3}-?[0-9a-f]{12}$ - isbn: an ISBN10 or
     * ISBN13 number string like "0321751043" or "978-0321751041" - isbn10: an ISBN10 number string like
     * "0321751043" - isbn13: an ISBN13 number string like "978-0321751041" - creditcard: a credit card
     * number defined by the regex
     * ^(?:4[0-9]{12}(?:[0-9]{3})?|5[1-5][0-9]{14}|6(?:011|5[0-9][0-9])[0-9]{12}|3[47][0-9]{13}|3(?:0[0-5]|[68][0-9])[0-9]{11}|(?:2131|1800|35\d{3})\d{11})$
     * with any non digit characters mixed in - ssn: a U.S. social security number following the regex
     * ^\d{3}[- ]?\d{2}[- ]?\d{4}$ - hexcolor: an hexadecimal color code like "#FFFFFF: following the regex
     * ^#?([0-9a-fA-F]{3}|[0-9a-fA-F]{6})$ - rgbcolor: an RGB color code like rgb like "rgb(255,255,2559" -
     *                                              * * * * * * * * * byte: base64 encoded binary data - password: any kind of string - date: a date string like
     * "2006-01-02" as defined by full-date in RFC3339 - duration: a duration string like "22 ns" as parsed
     *                                         * * * * * * * * by Golang time.ParseDuration or compatible with Scala duration format - datetime: a date time string
     * like "2014-12-15T19:30:20.000Z" as defined by date-time in RFC3339.
     *

     *
     * @return static
     */
    public function setFormat(string $format): static
    {
        $this->format = $format;

        return $this;
    }

    public function getId(): string|null
    {
        return $this->id;
    }

    /** @return static */
    public function setId(string $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getItems(): string
    {
        return $this->items;
    }

    /** @return static */
    public function setItems(string $items): static
    {
        $this->items = $items;

        return $this;
    }

    public function getMaxItems(): int|null
    {
        return $this->maxItems;
    }

    /** @return static */
    public function setMaxItems(int $maxItems): static
    {
        $this->maxItems = $maxItems;

        return $this;
    }

    public function getMaxLength(): int|null
    {
        return $this->maxLength;
    }

    /** @return static */
    public function setMaxLength(int $maxLength): static
    {
        $this->maxLength = $maxLength;

        return $this;
    }

    public function getMaxProperties(): int|null
    {
        return $this->maxProperties;
    }

    /** @return static */
    public function setMaxProperties(int $maxProperties): static
    {
        $this->maxProperties = $maxProperties;

        return $this;
    }

    public function getMaximum(): mixed
    {
        return $this->maximum;
    }

    /** @return static */
    public function setMaximum(mixed $maximum): static
    {
        $this->maximum = $maximum;

        return $this;
    }

    public function getMinItems(): int|null
    {
        return $this->minItems;
    }

    /** @return static */
    public function setMinItems(int $minItems): static
    {
        $this->minItems = $minItems;

        return $this;
    }

    public function getMinLength(): int|null
    {
        return $this->minLength;
    }

    /** @return static */
    public function setMinLength(int $minLength): static
    {
        $this->minLength = $minLength;

        return $this;
    }

    public function getMinProperties(): int|null
    {
        return $this->minProperties;
    }

    /** @return static */
    public function setMinProperties(int $minProperties): static
    {
        $this->minProperties = $minProperties;

        return $this;
    }

    public function getMinimum(): mixed
    {
        return $this->minimum;
    }

    /** @return static */
    public function setMinimum(mixed $minimum): static
    {
        $this->minimum = $minimum;

        return $this;
    }

    public function getMultipleOf(): mixed
    {
        return $this->multipleOf;
    }

    /** @return static */
    public function setMultipleOf(mixed $multipleOf): static
    {
        $this->multipleOf = $multipleOf;

        return $this;
    }

    public function getNot(): JSONSchemaProps|null
    {
        return $this->not;
    }

    /** @return static */
    public function setNot(JSONSchemaProps $not): static
    {
        $this->not = $not;

        return $this;
    }

    public function isNullable(): bool|null
    {
        return $this->nullable;
    }

    /** @return static */
    public function setIsNullable(bool $nullable): static
    {
        $this->nullable = $nullable;

        return $this;
    }

    /** @return iterable|JSONSchemaProps[] */
    public function getOneOf(): iterable|null
    {
        return $this->oneOf;
    }

    /** @return static */
    public function setOneOf(iterable $oneOf): static
    {
        $this->oneOf = $oneOf;

        return $this;
    }

    /** @return static */
    public function addOneOf(JSONSchemaProps $oneOf): static
    {
        if (! $this->oneOf) {
            $this->oneOf = new Collection();
        }

        $this->oneOf[] = $oneOf;

        return $this;
    }

    public function getPattern(): string|null
    {
        return $this->pattern;
    }

    /** @return static */
    public function setPattern(string $pattern): static
    {
        $this->pattern = $pattern;

        return $this;
    }

    public function getPatternProperties(): array|null
    {
        return $this->patternProperties;
    }

    /** @return static */
    public function setPatternProperties(array $patternProperties): static
    {
        $this->patternProperties = $patternProperties;

        return $this;
    }

    public function getProperties(): array|null
    {
        return $this->properties;
    }

    /** @return static */
    public function setProperties(array $properties): static
    {
        $this->properties = $properties;

        return $this;
    }

    public function getRequired(): array|null
    {
        return $this->required;
    }

    /** @return static */
    public function setRequired(array $required): static
    {
        $this->required = $required;

        return $this;
    }

    public function getTitle(): string|null
    {
        return $this->title;
    }

    /** @return static */
    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getType(): string|null
    {
        return $this->type;
    }

    /** @return static */
    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function isUniqueItems(): bool|null
    {
        return $this->uniqueItems;
    }

    /** @return static */
    public function setIsUniqueItems(bool $uniqueItems): static
    {
        $this->uniqueItems = $uniqueItems;

        return $this;
    }

    /**
     * x-kubernetes-embedded-resource defines that the value is an embedded Kubernetes runtime.Object, with
     * TypeMeta and ObjectMeta. The type must be object. It is allowed to further restrict the embedded
     * object. kind, apiVersion and metadata are validated automatically.
     * x-kubernetes-preserve-unknown-fields is allowed to be true, but does not have to be if the object is
     * fully specified (up to kind, apiVersion, metadata).
     */
    public function isXKubernetesEmbeddedResource(): bool|null
    {
        return $this->xKubernetesEmbeddedResource;
    }

    /**
     * x-kubernetes-embedded-resource defines that the value is an embedded Kubernetes runtime.Object, with
     * TypeMeta and ObjectMeta. The type must be object. It is allowed to further restrict the embedded
     * object. kind, apiVersion and metadata are validated automatically.
     * x-kubernetes-preserve-unknown-fields is allowed to be true, but does not have to be if the object is
     * fully specified (up to kind, apiVersion, metadata).
     *
     * @return static
     */
    public function setIsXKubernetesEmbeddedResource(bool $xKubernetesEmbeddedResource): static
    {
        $this->xKubernetesEmbeddedResource = $xKubernetesEmbeddedResource;

        return $this;
    }

    /**
     * x-kubernetes-int-or-string specifies that this value is either an integer or a string. If this is
     * true, an empty type is allowed and type as child of anyOf is permitted if following one of the
     * following patterns:
     *
     * 1) anyOf:
     *    - type: integer
     *    - type: string
     * 2) allOf:
     *    - anyOf:
     *      - type: integer
     *      - type: string
     *    - ... zero or more
     */
    public function isXKubernetesIntOrString(): bool|null
    {
        return $this->xKubernetesIntOrString;
    }

    /**
     * x-kubernetes-int-or-string specifies that this value is either an integer or a string. If this is
     * true, an empty type is allowed and type as child of anyOf is permitted if following one of the
     * following patterns:
     *
     * 1) anyOf:
     *    - type: integer
     *    - type: string
     * 2) allOf:
     *    - anyOf:
     *      - type: integer
     *      - type: string
     *    - ... zero or more
     *
     * @return static
     */
    public function setIsXKubernetesIntOrString(bool $xKubernetesIntOrString): static
    {
        $this->xKubernetesIntOrString = $xKubernetesIntOrString;

        return $this;
    }

    /**
     * x-kubernetes-list-map-keys annotates an array with the x-kubernetes-list-type `map` by specifying
     * the keys used as the index of the map.
     *
     * This tag MUST only be used on lists that have the "x-kubernetes-list-type" extension set to "map".
     * Also, the values specified for this attribute must be a scalar typed field of the child structure
     * (no nesting is supported).
     *
     * The properties specified must either be required or have a default value, to ensure those properties
     * are present for all list items.
     */
    public function getXKubernetesListMapKeys(): array|null
    {
        return $this->xKubernetesListMapKeys;
    }

    /**
     * x-kubernetes-list-map-keys annotates an array with the x-kubernetes-list-type `map` by specifying
     * the keys used as the index of the map.
     *
     * This tag MUST only be used on lists that have the "x-kubernetes-list-type" extension set to "map".
     * Also, the values specified for this attribute must be a scalar typed field of the child structure
     * (no nesting is supported).
     *
     * The properties specified must either be required or have a default value, to ensure those properties
     * are present for all list items.
     *
     * @return static
     */
    public function setXKubernetesListMapKeys(array $xKubernetesListMapKeys): static
    {
        $this->xKubernetesListMapKeys = $xKubernetesListMapKeys;

        return $this;
    }

    /**
     * x-kubernetes-list-type annotates an array to further describe its topology. This extension must only
     * be used on lists and may have 3 possible values:
     *
     * 1) `atomic`: the list is treated as a single entity, like a scalar.
     *      Atomic lists will be entirely replaced when updated. This extension
     *      may be used on any type of list (struct, scalar, ...).
     * 2) `set`:
     *      Sets are lists that must not have multiple items with the same value. Each
     *      value must be a scalar, an object with x-kubernetes-map-type `atomic` or an
     *      array with x-kubernetes-list-type `atomic`.
     * 3) `map`:
     *      These lists are like maps in that their elements have a non-index key
     *      used to identify them. Order is preserved upon merge. The map tag
     *      must only be used on a list with elements of type object.
     * Defaults to atomic for arrays.
     */
    public function getXKubernetesListType(): string|null
    {
        return $this->xKubernetesListType;
    }

    /**
     * x-kubernetes-list-type annotates an array to further describe its topology. This extension must only
     * be used on lists and may have 3 possible values:
     *
     * 1) `atomic`: the list is treated as a single entity, like a scalar.
     *      Atomic lists will be entirely replaced when updated. This extension
     *      may be used on any type of list (struct, scalar, ...).
     * 2) `set`:
     *      Sets are lists that must not have multiple items with the same value. Each
     *      value must be a scalar, an object with x-kubernetes-map-type `atomic` or an
     *      array with x-kubernetes-list-type `atomic`.
     * 3) `map`:
     *      These lists are like maps in that their elements have a non-index key
     *      used to identify them. Order is preserved upon merge. The map tag
     *      must only be used on a list with elements of type object.
     * Defaults to atomic for arrays.
     *
     * @return static
     */
    public function setXKubernetesListType(string $xKubernetesListType): static
    {
        $this->xKubernetesListType = $xKubernetesListType;

        return $this;
    }

    /**
     * x-kubernetes-map-type annotates an object to further describe its topology. This extension must only
     * be used when type is object and may have 2 possible values:
     *
     * 1) `granular`:
     *      These maps are actual maps (key-value pairs) and each fields are independent
     *      from each other (they can each be manipulated by separate actors). This is
     *      the default behaviour for all maps.
     * 2) `atomic`: the list is treated as a single entity, like a scalar.
     *      Atomic maps will be entirely replaced when updated.
     */
    public function getXKubernetesMapType(): string|null
    {
        return $this->xKubernetesMapType;
    }

    /**
     * x-kubernetes-map-type annotates an object to further describe its topology. This extension must only
     * be used when type is object and may have 2 possible values:
     *
     * 1) `granular`:
     *      These maps are actual maps (key-value pairs) and each fields are independent
     *      from each other (they can each be manipulated by separate actors). This is
     *      the default behaviour for all maps.
     * 2) `atomic`: the list is treated as a single entity, like a scalar.
     *      Atomic maps will be entirely replaced when updated.
     *
     * @return static
     */
    public function setXKubernetesMapType(string $xKubernetesMapType): static
    {
        $this->xKubernetesMapType = $xKubernetesMapType;

        return $this;
    }

    /**
     * x-kubernetes-preserve-unknown-fields stops the API server decoding step from pruning fields which
     * are not specified in the validation schema. This affects fields recursively, but switches back to
     * normal pruning behaviour if nested properties or additionalProperties are specified in the schema.
     * This can either be true or undefined. False is forbidden.
     */
    public function isXKubernetesPreserveUnknownFields(): bool|null
    {
        return $this->xKubernetesPreserveUnknownFields;
    }

    /**
     * x-kubernetes-preserve-unknown-fields stops the API server decoding step from pruning fields which
     * are not specified in the validation schema. This affects fields recursively, but switches back to
     * normal pruning behaviour if nested properties or additionalProperties are specified in the schema.
     * This can either be true or undefined. False is forbidden.
     *
     * @return static
     */
    public function setIsXKubernetesPreserveUnknownFields(bool $xKubernetesPreserveUnknownFields): static
    {
        $this->xKubernetesPreserveUnknownFields = $xKubernetesPreserveUnknownFields;

        return $this;
    }

    /**
     * x-kubernetes-validations describes a list of validation rules written in the CEL expression
     * language. This field is an alpha-level. Using this field requires the feature gate
     * `CustomResourceValidationExpressions` to be enabled.
     *
     * @return iterable|ValidationRule[]
     */
    public function getXKubernetesValidations(): iterable|null
    {
        return $this->xKubernetesValidations;
    }

    /**
     * x-kubernetes-validations describes a list of validation rules written in the CEL expression
     * language. This field is an alpha-level. Using this field requires the feature gate
     * `CustomResourceValidationExpressions` to be enabled.
     *
     * @return static
     */
    public function setXKubernetesValidations(iterable $xKubernetesValidations): static
    {
        $this->xKubernetesValidations = $xKubernetesValidations;

        return $this;
    }

    /** @return static */
    public function addXKubernetesValidations(ValidationRule $xKubernetesValidation): static
    {
        if (! $this->xKubernetesValidations) {
            $this->xKubernetesValidations = new Collection();
        }

        $this->xKubernetesValidations[] = $xKubernetesValidation;

        return $this;
    }
}
