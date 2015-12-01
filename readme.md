## Lumen / Internet Monitor and Port Scanning Utility

An  Internet Monitor and Server Information Tool

The tool uses ping on known hosts at regular intervals, and then records their responses.

When multiple failed requests are logged, an Outage is created. When the internet returns, the Outage record has an end date recorded.

This application is designed with uptime monitoring, and the goal is to send alerts when the network connection returns.

To set up scanning functionality, a cron job is required

```
* * * * * php /path/to/artisan schedule:run >> /dev/null 2>&1
```