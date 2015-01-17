### DB Dependency Admin (dbda)

[![Build Status](https://travis-ci.org/Thomblin/dbda.svg?branch=master)](https://travis-ci.org/Thomblin/dbda)

DB Dependency Admin (dbda) is an interface to handle dependent database tables/entries.
Relationships will be figured out by foreign keys, but can be specified (in detail) manually too.

The interface provides a simple way to create complete dumps of related data sets. 
For example given the tables countries, cities and train_stations, you could select one or more cities and 
dump that city with all related countries and train stations without any effort.

The interface provides a simple way to store (related) datasets. 
Given the above example if you would like to store a new train station assigned to a city,
you can easily insert that train station, without figuring out the foreign key reference between city and station.
Entering the name of the city would be enough and dbda provides the foreign key references on its own.

### License

DB Dependency Admin (dbda) is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
