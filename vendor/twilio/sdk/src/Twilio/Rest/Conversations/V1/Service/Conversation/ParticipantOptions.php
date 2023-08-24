<?php
/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Conversations
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace Twilio\Rest\Conversations\V1\Service\Conversation;

use Twilio\Options;
use Twilio\Values;

abstract class ParticipantOptions
{
    /**
     * @param string $identity A unique string identifier for the conversation participant as [Conversation User](https://www.twilio.com/docs/conversations/api/user-resource). This parameter is non-null if (and only if) the participant is using the Conversation SDK to communicate. Limited to 256 characters.
     * @param string $messagingBindingAddress The address of the participant's device, e.g. a phone or WhatsApp number. Together with the Proxy address, this determines a participant uniquely. This field (with proxy_address) is only null when the participant is interacting from an SDK endpoint (see the 'identity' field).
     * @param string $messagingBindingProxyAddress The address of the Twilio phone number (or WhatsApp number) that the participant is in contact with. This field, together with participant address, is only null when the participant is interacting from an SDK endpoint (see the 'identity' field).
     * @param \DateTime $dateCreated The date that this resource was created.
     * @param \DateTime $dateUpdated The date that this resource was last updated.
     * @param string $attributes An optional string metadata field you can use to store any data you wish. The string value must contain structurally valid JSON if specified.  **Note** that if the attributes are not set \\\"{}\\\" will be returned.
     * @param string $messagingBindingProjectedAddress The address of the Twilio phone number that is used in Group MMS. Communication mask for the Conversation participant with Identity.
     * @param string $roleSid The SID of a conversation-level [Role](https://www.twilio.com/docs/conversations/api/role-resource) to assign to the participant.
     * @param string $xTwilioWebhookEnabled The X-Twilio-Webhook-Enabled HTTP request header
     * @return CreateParticipantOptions Options builder
     */
    public static function create(
        
        string $identity = Values::NONE,
        string $messagingBindingAddress = Values::NONE,
        string $messagingBindingProxyAddress = Values::NONE,
        \DateTime $dateCreated = null,
        \DateTime $dateUpdated = null,
        string $attributes = Values::NONE,
        string $messagingBindingProjectedAddress = Values::NONE,
        string $roleSid = Values::NONE,
        string $xTwilioWebhookEnabled = Values::NONE

    ): CreateParticipantOptions
    {
        return new CreateParticipantOptions(
            $identity,
            $messagingBindingAddress,
            $messagingBindingProxyAddress,
            $dateCreated,
            $dateUpdated,
            $attributes,
            $messagingBindingProjectedAddress,
            $roleSid,
            $xTwilioWebhookEnabled
        );
    }

    /**
     * @param string $xTwilioWebhookEnabled The X-Twilio-Webhook-Enabled HTTP request header
     * @return DeleteParticipantOptions Options builder
     */
    public static function delete(
        
        string $xTwilioWebhookEnabled = Values::NONE

    ): DeleteParticipantOptions
    {
        return new DeleteParticipantOptions(
            $xTwilioWebhookEnabled
        );
    }



    /**
     * @param \DateTime $dateCreated The date that this resource was created.
     * @param \DateTime $dateUpdated The date that this resource was last updated.
     * @param string $identity A unique string identifier for the conversation participant as [Conversation User](https://www.twilio.com/docs/conversations/api/user-resource). This parameter is non-null if (and only if) the participant is using the Conversation SDK to communicate. Limited to 256 characters.
     * @param string $attributes An optional string metadata field you can use to store any data you wish. The string value must contain structurally valid JSON if specified.  **Note** that if the attributes are not set \\\"{}\\\" will be returned.
     * @param string $roleSid The SID of a conversation-level [Role](https://www.twilio.com/docs/conversations/api/role-resource) to assign to the participant.
     * @param string $messagingBindingProxyAddress The address of the Twilio phone number that the participant is in contact with. 'null' value will remove it.
     * @param string $messagingBindingProjectedAddress The address of the Twilio phone number that is used in Group MMS. 'null' value will remove it.
     * @param int $lastReadMessageIndex Index of last “read” message in the [Conversation](https://www.twilio.com/docs/conversations/api/conversation-resource) for the Participant.
     * @param string $lastReadTimestamp Timestamp of last “read” message in the [Conversation](https://www.twilio.com/docs/conversations/api/conversation-resource) for the Participant.
     * @param string $xTwilioWebhookEnabled The X-Twilio-Webhook-Enabled HTTP request header
     * @return UpdateParticipantOptions Options builder
     */
    public static function update(
        
        \DateTime $dateCreated = null,
        \DateTime $dateUpdated = null,
        string $identity = Values::NONE,
        string $attributes = Values::NONE,
        string $roleSid = Values::NONE,
        string $messagingBindingProxyAddress = Values::NONE,
        string $messagingBindingProjectedAddress = Values::NONE,
        int $lastReadMessageIndex = Values::INT_NONE,
        string $lastReadTimestamp = Values::NONE,
        string $xTwilioWebhookEnabled = Values::NONE

    ): UpdateParticipantOptions
    {
        return new UpdateParticipantOptions(
            $dateCreated,
            $dateUpdated,
            $identity,
            $attributes,
            $roleSid,
            $messagingBindingProxyAddress,
            $messagingBindingProjectedAddress,
            $lastReadMessageIndex,
            $lastReadTimestamp,
            $xTwilioWebhookEnabled
        );
    }

}

class CreateParticipantOptions extends Options
    {
    /**
     * @param string $identity A unique string identifier for the conversation participant as [Conversation User](https://www.twilio.com/docs/conversations/api/user-resource). This parameter is non-null if (and only if) the participant is using the Conversation SDK to communicate. Limited to 256 characters.
     * @param string $messagingBindingAddress The address of the participant's device, e.g. a phone or WhatsApp number. Together with the Proxy address, this determines a participant uniquely. This field (with proxy_address) is only null when the participant is interacting from an SDK endpoint (see the 'identity' field).
     * @param string $messagingBindingProxyAddress The address of the Twilio phone number (or WhatsApp number) that the participant is in contact with. This field, together with participant address, is only null when the participant is interacting from an SDK endpoint (see the 'identity' field).
     * @param \DateTime $dateCreated The date that this resource was created.
     * @param \DateTime $dateUpdated The date that this resource was last updated.
     * @param string $attributes An optional string metadata field you can use to store any data you wish. The string value must contain structurally valid JSON if specified.  **Note** that if the attributes are not set \\\"{}\\\" will be returned.
     * @param string $messagingBindingProjectedAddress The address of the Twilio phone number that is used in Group MMS. Communication mask for the Conversation participant with Identity.
     * @param string $roleSid The SID of a conversation-level [Role](https://www.twilio.com/docs/conversations/api/role-resource) to assign to the participant.
     * @param string $xTwilioWebhookEnabled The X-Twilio-Webhook-Enabled HTTP request header
     */
    public function __construct(
        
        string $identity = Values::NONE,
        string $messagingBindingAddress = Values::NONE,
        string $messagingBindingProxyAddress = Values::NONE,
        \DateTime $dateCreated = null,
        \DateTime $dateUpdated = null,
        string $attributes = Values::NONE,
        string $messagingBindingProjectedAddress = Values::NONE,
        string $roleSid = Values::NONE,
        string $xTwilioWebhookEnabled = Values::NONE

    ) {
        $this->options['identity'] = $identity;
        $this->options['messagingBindingAddress'] = $messagingBindingAddress;
        $this->options['messagingBindingProxyAddress'] = $messagingBindingProxyAddress;
        $this->options['dateCreated'] = $dateCreated;
        $this->options['dateUpdated'] = $dateUpdated;
        $this->options['attributes'] = $attributes;
        $this->options['messagingBindingProjectedAddress'] = $messagingBindingProjectedAddress;
        $this->options['roleSid'] = $roleSid;
        $this->options['xTwilioWebhookEnabled'] = $xTwilioWebhookEnabled;
    }

    /**
     * A unique string identifier for the conversation participant as [Conversation User](https://www.twilio.com/docs/conversations/api/user-resource). This parameter is non-null if (and only if) the participant is using the Conversation SDK to communicate. Limited to 256 characters.
     *
     * @param string $identity A unique string identifier for the conversation participant as [Conversation User](https://www.twilio.com/docs/conversations/api/user-resource). This parameter is non-null if (and only if) the participant is using the Conversation SDK to communicate. Limited to 256 characters.
     * @return $this Fluent Builder
     */
    public function setIdentity(string $identity): self
    {
        $this->options['identity'] = $identity;
        return $this;
    }

    /**
     * The address of the participant's device, e.g. a phone or WhatsApp number. Together with the Proxy address, this determines a participant uniquely. This field (with proxy_address) is only null when the participant is interacting from an SDK endpoint (see the 'identity' field).
     *
     * @param string $messagingBindingAddress The address of the participant's device, e.g. a phone or WhatsApp number. Together with the Proxy address, this determines a participant uniquely. This field (with proxy_address) is only null when the participant is interacting from an SDK endpoint (see the 'identity' field).
     * @return $this Fluent Builder
     */
    public function setMessagingBindingAddress(string $messagingBindingAddress): self
    {
        $this->options['messagingBindingAddress'] = $messagingBindingAddress;
        return $this;
    }

    /**
     * The address of the Twilio phone number (or WhatsApp number) that the participant is in contact with. This field, together with participant address, is only null when the participant is interacting from an SDK endpoint (see the 'identity' field).
     *
     * @param string $messagingBindingProxyAddress The address of the Twilio phone number (or WhatsApp number) that the participant is in contact with. This field, together with participant address, is only null when the participant is interacting from an SDK endpoint (see the 'identity' field).
     * @return $this Fluent Builder
     */
    public function setMessagingBindingProxyAddress(string $messagingBindingProxyAddress): self
    {
        $this->options['messagingBindingProxyAddress'] = $messagingBindingProxyAddress;
        return $this;
    }

    /**
     * The date that this resource was created.
     *
     * @param \DateTime $dateCreated The date that this resource was created.
     * @return $this Fluent Builder
     */
    public function setDateCreated(\DateTime $dateCreated): self
    {
        $this->options['dateCreated'] = $dateCreated;
        return $this;
    }

    /**
     * The date that this resource was last updated.
     *
     * @param \DateTime $dateUpdated The date that this resource was last updated.
     * @return $this Fluent Builder
     */
    public function setDateUpdated(\DateTime $dateUpdated): self
    {
        $this->options['dateUpdated'] = $dateUpdated;
        return $this;
    }

    /**
     * An optional string metadata field you can use to store any data you wish. The string value must contain structurally valid JSON if specified.  **Note** that if the attributes are not set \\\"{}\\\" will be returned.
     *
     * @param string $attributes An optional string metadata field you can use to store any data you wish. The string value must contain structurally valid JSON if specified.  **Note** that if the attributes are not set \\\"{}\\\" will be returned.
     * @return $this Fluent Builder
     */
    public function setAttributes(string $attributes): self
    {
        $this->options['attributes'] = $attributes;
        return $this;
    }

    /**
     * The address of the Twilio phone number that is used in Group MMS. Communication mask for the Conversation participant with Identity.
     *
     * @param string $messagingBindingProjectedAddress The address of the Twilio phone number that is used in Group MMS. Communication mask for the Conversation participant with Identity.
     * @return $this Fluent Builder
     */
    public function setMessagingBindingProjectedAddress(string $messagingBindingProjectedAddress): self
    {
        $this->options['messagingBindingProjectedAddress'] = $messagingBindingProjectedAddress;
        return $this;
    }

    /**
     * The SID of a conversation-level [Role](https://www.twilio.com/docs/conversations/api/role-resource) to assign to the participant.
     *
     * @param string $roleSid The SID of a conversation-level [Role](https://www.twilio.com/docs/conversations/api/role-resource) to assign to the participant.
     * @return $this Fluent Builder
     */
    public function setRoleSid(string $roleSid): self
    {
        $this->options['roleSid'] = $roleSid;
        return $this;
    }

    /**
     * The X-Twilio-Webhook-Enabled HTTP request header
     *
     * @param string $xTwilioWebhookEnabled The X-Twilio-Webhook-Enabled HTTP request header
     * @return $this Fluent Builder
     */
    public function setXTwilioWebhookEnabled(string $xTwilioWebhookEnabled): self
    {
        $this->options['xTwilioWebhookEnabled'] = $xTwilioWebhookEnabled;
        return $this;
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString(): string
    {
        $options = \http_build_query(Values::of($this->options), '', ' ');
        return '[Twilio.Conversations.V1.CreateParticipantOptions ' . $options . ']';
    }
}

class DeleteParticipantOptions extends Options
    {
    /**
     * @param string $xTwilioWebhookEnabled The X-Twilio-Webhook-Enabled HTTP request header
     */
    public function __construct(
        
        string $xTwilioWebhookEnabled = Values::NONE

    ) {
        $this->options['xTwilioWebhookEnabled'] = $xTwilioWebhookEnabled;
    }

    /**
     * The X-Twilio-Webhook-Enabled HTTP request header
     *
     * @param string $xTwilioWebhookEnabled The X-Twilio-Webhook-Enabled HTTP request header
     * @return $this Fluent Builder
     */
    public function setXTwilioWebhookEnabled(string $xTwilioWebhookEnabled): self
    {
        $this->options['xTwilioWebhookEnabled'] = $xTwilioWebhookEnabled;
        return $this;
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString(): string
    {
        $options = \http_build_query(Values::of($this->options), '', ' ');
        return '[Twilio.Conversations.V1.DeleteParticipantOptions ' . $options . ']';
    }
}



class UpdateParticipantOptions extends Options
    {
    /**
     * @param \DateTime $dateCreated The date that this resource was created.
     * @param \DateTime $dateUpdated The date that this resource was last updated.
     * @param string $identity A unique string identifier for the conversation participant as [Conversation User](https://www.twilio.com/docs/conversations/api/user-resource). This parameter is non-null if (and only if) the participant is using the Conversation SDK to communicate. Limited to 256 characters.
     * @param string $attributes An optional string metadata field you can use to store any data you wish. The string value must contain structurally valid JSON if specified.  **Note** that if the attributes are not set \\\"{}\\\" will be returned.
     * @param string $roleSid The SID of a conversation-level [Role](https://www.twilio.com/docs/conversations/api/role-resource) to assign to the participant.
     * @param string $messagingBindingProxyAddress The address of the Twilio phone number that the participant is in contact with. 'null' value will remove it.
     * @param string $messagingBindingProjectedAddress The address of the Twilio phone number that is used in Group MMS. 'null' value will remove it.
     * @param int $lastReadMessageIndex Index of last “read” message in the [Conversation](https://www.twilio.com/docs/conversations/api/conversation-resource) for the Participant.
     * @param string $lastReadTimestamp Timestamp of last “read” message in the [Conversation](https://www.twilio.com/docs/conversations/api/conversation-resource) for the Participant.
     * @param string $xTwilioWebhookEnabled The X-Twilio-Webhook-Enabled HTTP request header
     */
    public function __construct(
        
        \DateTime $dateCreated = null,
        \DateTime $dateUpdated = null,
        string $identity = Values::NONE,
        string $attributes = Values::NONE,
        string $roleSid = Values::NONE,
        string $messagingBindingProxyAddress = Values::NONE,
        string $messagingBindingProjectedAddress = Values::NONE,
        int $lastReadMessageIndex = Values::INT_NONE,
        string $lastReadTimestamp = Values::NONE,
        string $xTwilioWebhookEnabled = Values::NONE

    ) {
        $this->options['dateCreated'] = $dateCreated;
        $this->options['dateUpdated'] = $dateUpdated;
        $this->options['identity'] = $identity;
        $this->options['attributes'] = $attributes;
        $this->options['roleSid'] = $roleSid;
        $this->options['messagingBindingProxyAddress'] = $messagingBindingProxyAddress;
        $this->options['messagingBindingProjectedAddress'] = $messagingBindingProjectedAddress;
        $this->options['lastReadMessageIndex'] = $lastReadMessageIndex;
        $this->options['lastReadTimestamp'] = $lastReadTimestamp;
        $this->options['xTwilioWebhookEnabled'] = $xTwilioWebhookEnabled;
    }

    /**
     * The date that this resource was created.
     *
     * @param \DateTime $dateCreated The date that this resource was created.
     * @return $this Fluent Builder
     */
    public function setDateCreated(\DateTime $dateCreated): self
    {
        $this->options['dateCreated'] = $dateCreated;
        return $this;
    }

    /**
     * The date that this resource was last updated.
     *
     * @param \DateTime $dateUpdated The date that this resource was last updated.
     * @return $this Fluent Builder
     */
    public function setDateUpdated(\DateTime $dateUpdated): self
    {
        $this->options['dateUpdated'] = $dateUpdated;
        return $this;
    }

    /**
     * A unique string identifier for the conversation participant as [Conversation User](https://www.twilio.com/docs/conversations/api/user-resource). This parameter is non-null if (and only if) the participant is using the Conversation SDK to communicate. Limited to 256 characters.
     *
     * @param string $identity A unique string identifier for the conversation participant as [Conversation User](https://www.twilio.com/docs/conversations/api/user-resource). This parameter is non-null if (and only if) the participant is using the Conversation SDK to communicate. Limited to 256 characters.
     * @return $this Fluent Builder
     */
    public function setIdentity(string $identity): self
    {
        $this->options['identity'] = $identity;
        return $this;
    }

    /**
     * An optional string metadata field you can use to store any data you wish. The string value must contain structurally valid JSON if specified.  **Note** that if the attributes are not set \\\"{}\\\" will be returned.
     *
     * @param string $attributes An optional string metadata field you can use to store any data you wish. The string value must contain structurally valid JSON if specified.  **Note** that if the attributes are not set \\\"{}\\\" will be returned.
     * @return $this Fluent Builder
     */
    public function setAttributes(string $attributes): self
    {
        $this->options['attributes'] = $attributes;
        return $this;
    }

    /**
     * The SID of a conversation-level [Role](https://www.twilio.com/docs/conversations/api/role-resource) to assign to the participant.
     *
     * @param string $roleSid The SID of a conversation-level [Role](https://www.twilio.com/docs/conversations/api/role-resource) to assign to the participant.
     * @return $this Fluent Builder
     */
    public function setRoleSid(string $roleSid): self
    {
        $this->options['roleSid'] = $roleSid;
        return $this;
    }

    /**
     * The address of the Twilio phone number that the participant is in contact with. 'null' value will remove it.
     *
     * @param string $messagingBindingProxyAddress The address of the Twilio phone number that the participant is in contact with. 'null' value will remove it.
     * @return $this Fluent Builder
     */
    public function setMessagingBindingProxyAddress(string $messagingBindingProxyAddress): self
    {
        $this->options['messagingBindingProxyAddress'] = $messagingBindingProxyAddress;
        return $this;
    }

    /**
     * The address of the Twilio phone number that is used in Group MMS. 'null' value will remove it.
     *
     * @param string $messagingBindingProjectedAddress The address of the Twilio phone number that is used in Group MMS. 'null' value will remove it.
     * @return $this Fluent Builder
     */
    public function setMessagingBindingProjectedAddress(string $messagingBindingProjectedAddress): self
    {
        $this->options['messagingBindingProjectedAddress'] = $messagingBindingProjectedAddress;
        return $this;
    }

    /**
     * Index of last “read” message in the [Conversation](https://www.twilio.com/docs/conversations/api/conversation-resource) for the Participant.
     *
     * @param int $lastReadMessageIndex Index of last “read” message in the [Conversation](https://www.twilio.com/docs/conversations/api/conversation-resource) for the Participant.
     * @return $this Fluent Builder
     */
    public function setLastReadMessageIndex(int $lastReadMessageIndex): self
    {
        $this->options['lastReadMessageIndex'] = $lastReadMessageIndex;
        return $this;
    }

    /**
     * Timestamp of last “read” message in the [Conversation](https://www.twilio.com/docs/conversations/api/conversation-resource) for the Participant.
     *
     * @param string $lastReadTimestamp Timestamp of last “read” message in the [Conversation](https://www.twilio.com/docs/conversations/api/conversation-resource) for the Participant.
     * @return $this Fluent Builder
     */
    public function setLastReadTimestamp(string $lastReadTimestamp): self
    {
        $this->options['lastReadTimestamp'] = $lastReadTimestamp;
        return $this;
    }

    /**
     * The X-Twilio-Webhook-Enabled HTTP request header
     *
     * @param string $xTwilioWebhookEnabled The X-Twilio-Webhook-Enabled HTTP request header
     * @return $this Fluent Builder
     */
    public function setXTwilioWebhookEnabled(string $xTwilioWebhookEnabled): self
    {
        $this->options['xTwilioWebhookEnabled'] = $xTwilioWebhookEnabled;
        return $this;
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString(): string
    {
        $options = \http_build_query(Values::of($this->options), '', ' ');
        return '[Twilio.Conversations.V1.UpdateParticipantOptions ' . $options . ']';
    }
}

