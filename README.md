# example of processing HTTP-HL7 messages in symfony



## Description



Example of simple processing of HL7 messages in an HTTP request. Adds the information in the patient_identification table to the database, and saves the messages in the message_info table, using aranyasen/hl7 PHP library.
In my case I used an MLLP to HTTP proxy


## Installation

- Containers I used:
    - bitnami/symfony
    - mariadb
    - rivethealth/mllp-http