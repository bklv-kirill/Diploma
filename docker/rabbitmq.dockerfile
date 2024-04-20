FROM rabbitmq

WORKDIR /var/lib/rabbitmq

RUN rabbitmq-plugins enable --offline rabbitmq_mqtt rabbitmq_federation_management rabbitmq_stomp