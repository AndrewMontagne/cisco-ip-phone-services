<device>
    <loadInformation>P0030801SR02</loadInformation>
    <vendorConfig>
        <disableSpeaker>false</disableSpeaker>
        <disableSpeakerAndHeadset>false</disableSpeakerAndHeadset>
        <forwardingDelay>1</forwardingDelay>
        <pcPort>1</pcPort>
        <settingsAccess>2</settingsAccess>
        <garp>0</garp>
        <voiceVlanAccess>0</voiceVlanAccess>
        <autoSelectLineEnable>0</autoSelectLineEnable>
        <webAccess>0</webAccess>
    </vendorConfig>
    <devicePool>
        <dateTimeSetting>
            <dateTemplate>M/D/YA</dateTemplate>
            <timeZone>Europe/London</timeZone>
        </dateTimeSetting>
        <callManagerGroup>
            <members>
                <member priority="0">
                    <callManager>
                        <ports>
                            <ethernetPhonePort>2000</ethernetPhonePort>
                        </ports>
                        <processNodeName><?=$pbxHost;?></processNodeName>
                    </callManager>
                </member>
            </members>
        </callManagerGroup>
    </devicePool>
    <idleTimeout>60</idleTimeout>
    <authenticationURL>http://<?=$serviceHost;?>/handset/auth</authenticationURL>
    <directoryURL>http://<?=$serviceHost;?>/handset/directory</directoryURL>
    <idleURL>http://<?=$serviceHost;?>/handset/idle</idleURL>
    <informationURL>http://<?=$serviceHost;?>/handset/info</informationURL>
    <messagesURL>http://<?=$serviceHost;?>/handset/messages</messagesURL>
    <servicesURL>http://<?=$serviceHost;?>/handset/services</servicesURL>
    <logoURL>http://<?=$serviceHost;?>/handset/logo</logoURL>
</device>
