## Lumen / Raspberry Pi Internet Monitor

The monitor application is designed to run on a Raspberry Pi.

It uses nmap to ping known hosts at regular intervals, and then records their responses.

When multiple failed requests are logged, an Outage is created. When the internet returns, the Outage record has an end date recorded.

This application is designed with uptime monitoring, and the goal is to send alerts when the network connection returns.