<?php

use Illuminate\Database\Seeder;

class CondicionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	  	\DB::table('condicions')->insert(array (
	  		0 =>
	  		array (
				'id'     => 1,
				'descripcion' => 'Lorem ipsum dolor sit amet consectetur adipiscing elit faucibus, magnis natoque metus potenti duis tempor litora, sociis placerat ut risus in gravida orci. Aliquet donec nisl etiam mus velit pulvinar, torquent tortor non convallis posuere pellentesque curae, vehicula a class litora placerat. Sollicitudin sed praesent nunc nec venenatis inceptos maecenas molestie nisl, dis duis accumsan iaculis rhoncus pellentesque eleifend a ultrices, lacinia aptent aliquet leo mi commodo mattis orci.

								Accumsan facilisi mi enim dictum nostra eleifend posuere dignissim hendrerit nunc varius, ultrices sodales himenaeos quis montes massa per cras pretium orci, vehicula vitae imperdiet curabitur erat risus mus sollicitudin class elementum. Natoque etiam dui rutrum risus tincidunt magna condimentum, cras iaculis accumsan sociosqu id class non, mollis venenatis himenaeos fermentum litora vel. Ut sodales a mauris nec tempus imperdiet facilisis dapibus ligula ante, tincidunt aliquet lacinia duis ac cum vel phasellus euismod felis, leo tristique tortor iaculis dui bibendum aliquam consequat habitant. Eleifend vulputate non pretium id ultrices montes, phasellus nisl diam rutrum nostra, pulvinar sed penatibus vitae parturient.

								At molestie dui condimentum velit potenti ad auctor platea, facilisis netus phasellus etiam fringilla senectus magna fermentum arcu, sapien morbi vel tempus curae urna justo. Scelerisque ut torquent porttitor nunc tempus cum bibendum class, interdum sem varius sed at magna id luctus vel, habitasse risus ligula ac cras congue integer. Dapibus vulputate mattis euismod proin mollis vivamus lacus potenti porttitor, nam sociis consequat primis facilisis eget erat dignissim nisl, platea bibendum semper class gravida hendrerit phasellus dis. Non taciti tristique viverra felis vivamus malesuada orci consequat quis, etiam libero integer ante varius lacus mattis laoreet ornare, torquent fusce accumsan in venenatis nisi dictumst purus. Magna lobortis vel platea nunc placerat commodo suspendisse eros donec, mi aptent scelerisque neque facilisi fusce proin.',
	  		),
	  	));
    }
}
