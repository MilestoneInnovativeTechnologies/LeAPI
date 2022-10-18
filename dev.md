Command prompt with Admin privilege<br>
Install laravel `laravel new LeAPI`<br>
Move to directory `cd LeAPI`<br>
Create milestone folder `mkdir milestone`<br>
Clone source from github `https://github.com/MilestoneInnovativeTechnologies/LeAPI.git leapi`<br>

In root composer.json file<br>Add following line to "autoload" > "psr-4"<br>
`"Milestone\\LeAPI\\": "milestone/leapi/src/"`<br>

In config > app > providers<br>Add following line<br>
`Milestone\LeAPI\LeAPIServiceProvider::class`<br>





