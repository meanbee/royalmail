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

This library uses six CSV files to determine which shipping methods are available: 

1. [1_countryCodeToZone.csv](https://github.com/meanbee/royalmail/blob/develop/lib/Meanbee/RoyalmailPHPLibrary/data/1_countryToZone.csv)
    * Country code
    * World zone. Each country, defined by its country code can be in more then one zone. The code "GB" for Great Britain is in the EU and the GB World zone. There are four world zones:
        * WORLD_ZONE_GB
        * WORLD_ZONE_EU
        * WORLD_ZONE_ONE
        * WORLD_ZONE_TWO
        
2. [2_zoneToDeliveryMethod.csv](https://github.com/meanbee/royalmail/blob/develop/lib/Meanbee/RoyalmailPHPLibrary/data/2_zoneToDeliveryMethod.csv)
    * World zone
    * Shipping zone. 

    Each shipping method's name starts with the world zone it links to as prices differ between zones. 
    
3. [3_deliveryMethodMeta.csv](https://github.com/meanbee/royalmail/blob/develop/lib/Meanbee/RoyalmailPHPLibrary/data/3_deliveryMethodMeta.csv) 
    * Delivery method
    * Minimum price of method
    * Maximum price available to the method (the maximum price of shipping cart this method applies to)
    * Max insurance available on method
    * Clean method name. The clean method name represents the name of the method group, and is also represented in the 5 and 6 csvs. The clean method name is used to match multiple methods of the same type to the correct group.
    
4. [4_deliveryToPrice.csv](https://github.com/meanbee/royalmail/blob/develop/lib/Meanbee/RoyalmailPHPLibrary/data/4_deliveryToPrice.csv)
    * Method name
    * Minimum weight
    * Maximum weight
    * Max insurance value available to the method
    * Price of method
    * Max insurance value
    * In the case of small or medium parcel up to 2kg in weight "SMALL" or "MEDIUM" else blank
     
5. [5_cleanNameToMethod.csv](https://github.com/meanbee/royalmail/blob/develop/lib/Meanbee/RoyalmailPHPLibrary/data/5_cleanNameToMethod.csv) 
    * Method group name
    * Clean method name
    * Dirty method name

    Each method group name is a all lowercase name that represents the group of method names overall. One method name represnts multipel method names.
     
6. [6_cleanNameToMethodGroup](https://github.com/meanbee/royalmail/blob/develop/lib/Meanbee/RoyalmailPHPLibrary/data/6_cleanNameMethodGroup.csv)
    * Method group name
    * Clean method name

    This csv is used to form list of just the clean method names if necessasary. 

Method names are constructed in the WORLDZONE_NAME_WITH_UNDERSCORES format with a separate method being added for each separate foramt. Examples of these can be seen in multiple of the csvs. In the case of extra insurance available on the item, another method must be created. An example can be seen in the 3_deliveryMethodMeta.csv.   

