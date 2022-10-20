### Installation
Include package<br>
`composer require milestone/leapi`<br>

Publish<br>
`php artisan vendor:publish`

Add clients in config > leapi.php<br>
in the format<br>
`'key' => 'name'`<br>
Can add as many client required..<br><br>

Once done, things are ready, Data can be fetched as per the below details...<br>

URL Format:<br>
/leapi/{`client`}/{`action`}/{`table`}<br><br>

`client` any key added in config > leapi.php<br>
`action` get or set, for getting or setting data respectively
`table` the name of the table from where the data required

#### `get` Parameters<br>
`id=1` `id=10,11` for getting data of specified id<br>
`limit=0,100` for getting 100 number of data after skipping 0 records.<br>
`count` if the parameters have a key named count, then the count of query will be returned<br>
`fields=id` `fields=date,progress` returns only specified columns only<br>

##### Aggregator functions
`max=price` returns the maximum value of price. `max=id` this will return maximum of id. If passed without value, then `max=id` will be considered<br>
`min=price` returns the minimum value of price. `min=id` this will return minimum of id. If passed without value, then `min=id` will be considered<br>
`avg=price` returns the average value of price. `avg=id` this will return average of id. If passed without value, then `avg=id` will be considered<br>
`sum=price` returns the sum value of price. `sum=id` this will return sum of id. If passed without value, then `sum=id` will be considered<br>
<br>
<br>
<br>
<br>
<br>
<br>
