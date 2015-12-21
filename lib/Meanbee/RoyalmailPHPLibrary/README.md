# Royal Mail PHP Shipping Method Library

![image](http://up.nicksays.co.uk/200k1j35411o2i0Y0N3S/RoyalMail.png)

This repository contains the source code for the Meanbee Royal Mail PHP Library. It takes the country code, package value, and package weight and then outputs an array of objects containing the available shipping methods.

## Using the Library

To use the library, call the **getMethods** method with your country code ([in the ISO 3166 format](https://en.wikipedia.org/wiki/ISO_3166-1_alpha-2)), package value, and package weight. 

#### Example Usage
```PHP
$calculateMethodClass = new CalculateMethodClass();

$calculateMethodClass->getMethods('GB', 20, 0.050);
```

This will return an array of objects where each object contains the shipping method name, minimum weight, maximum weight, price of the method, maximum insurance value, and proper name of the shipping method.

## Unit Testing

This program is automatically unit tested with phpunit and travis.

## CSV data format

This library uses four CSV files to determine which shipping methods are available: 

1. 1_countryCodeToZone.csv - maps country code to world zone
2. 2_zoneToDeliveryMethod.csv - maps world zone to all possible shipping methods in that world zone
3. 3_deliveryMethodMeta.csv - maps delivery method to minimum and maximum price available to the method, max insurance available on method, and the clean method name
4. 4_deliveryToPrice.csv - maps method name to minimum and maximum weight, max insurance value, price of method, and max insurance value 

In the case of extra insurance available on the item, another method must be created. An example can be seen in the 3_deliveryMethodMeta.csv.   