<?php

if(is_live()){
    add_action('gform_after_submission', 'post_to_fub', 10, 2);
}

function post_to_fub($entry, $form)
{
    $data_form_page = get_field("gs_register_form", "option");
    if($data_form_page)
    {
        if($entry['form_id'] == $data_form_page['form_id']){

            $endpoint_url = 'https://api.followupboss.com/v1/events';
            $body = [
                "person" => [
                    "contacted" => false,
                    "emails" => [
                        [
                            "isPrimary" => false,
                            "value" => $entry[4],
                            "type" => "work"
                        ]
                    ],
                    "phones" => [
                        [
                            "isPrimary" => false,
                            "value" => $entry[3],
                            "type" => "work"
                        ]
                    ],
                    "tags" => [
                        "Website Lead"
                    ],
                    "addresses" => [
                        [
                            "city" => $entry[17],
                            "code" => $entry[18]
                        ]
                    ],
                    "firstName" => $entry[15],
                    "lastName" => $entry[16],
                    "sourceUrl" => $entry['source_url'],
                    "customPriceRange" => $entry[7],
                    "customHowDidYouHearAboutUs" => $entry[6],
                    "customPreferredHomeSize" => $entry[8],
                    "customBedroomType" => $entry[9],
                    "customWhatTypeOfBuyerAreYou" => $entry[10],
                    "customBrokerageName" => isset($entry[14]) ? $entry[14] : "",
                    "customBrokerName" => isset($entry[13]) ? $entry[13] : "",
                    "customAreYouABroker" => $entry[12],
                    "customAreYouWorkingWithABroker" => isset($entry[11]) ? $entry[11] : "",
                    "customReferrerURL" => $entry['source_url']
                ],
                "source" => "Lot16 Website",
                "system" => "Lot16 Website",
                "type" => "Inquiry"
            ];
            GFCommon::log_debug('gform_after_submission: body => ' . print_r($body, true));

            $response = wp_remote_post(
                $endpoint_url,
                array(
                    'body' => json_encode($body),
                    'headers' => array(
                        "Content-Type" => "application/json",
                        "Accept" => "application/json",
                        "Authorization" => "Basic ZmthXzBZUWFwRUY1RlJvYVQyaWE1bVlEV1VqWmFHcGU3elFDWEQ6"
                    ),
                )
            );
            GFCommon::log_debug('gform_after_submission: response => ' . print_r($response, true));
            
        }
    }
}
