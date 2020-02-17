# THIS MODULE IS NO MORE SUPPORTED

# Lof Admin Payment Magento extension
==================

Lof Admin Payment is a Magento 1.x extension that adds a new payment method to your store. 
 You can configure fees based on order amount, different fees for local and foreign destinations.
 Lof Admin Payment supports both fixed and percentage fee and is fully integrated with magento shipping methods backend, 
 taxes calculation and price rules.
 You can configure a standard fee and/or fee for different total order amounts.

Extension's development is available on github here:
https://github.com/landofcoder/magento1-admin-payment


# Stable version

1.2.6

# MAGENTO Installation

### via [modman](https://github.com/colinmollenhour/modman):
<pre>
modman clone https://github.com/landofcoder/magento1-admin-payment
</pre>

### via [composer](https://getcomposer.org/download/)
Add to your composer.json file this:
<pre>
{
    ...
    "require": {
        "magento-hackathon/magento-composer-installer": "*",
        "landofcoder/module-admin-payment": "1.2.6"
    },
    ....
    "repositories": [
        {
            "type": "vcs",
            "url": "git@github.com:landofcoder/magento1-admin-payment.git"
        }
    ],
    .....
}</pre>
