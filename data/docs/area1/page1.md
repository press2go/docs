# Area 1 - Page 1

##Lorem ipsum dolor sit amet, consectetur adipiscing elit.
Vestibulum pretium tellus ac purus volutpat porttitor.
[Link to page 2]({{path}}/page2)
Suspendisse _quis ipsum nec nunc_ tempor lacinia nec quis sapien.
Sed quis turpis vel `eros congue sollicitudin` et ac dui.
Fusce facilisis eros quis lectus condimentum vel pharetra tellus convallis.
Morbi hendrerit diam in felis faucibus volutpat.
Etiam vel augue eget est aliquam `condimentum at id ante.
Ut pulvinar eros non velit porttitor placerat.
Nunc blandit, purus `in vestibulum` luctus, diam erat mattis velit, ut imperdiet eros velit eget elit.
Vestibulum et urna ut lacus porta laoreet et sed est.

	$ch = curl_init("http://www.example.com/");
	$fp = fopen("example_homepage.txt", "w");

	curl_setopt($ch, CURLOPT_FILE, $fp);
	curl_setopt($ch, CURLOPT_HEADER, 0);

	curl_exec($ch);
	curl_close($ch);
	fclose($fp);

##Morbi aliquam neque a est aliquet congue.
Maecenas pretium sem id leo mattis mollis in vel enim.
Vivamus ipsum tellus, fringilla vitae tincidunt ut, tincidunt a libero.
Sed felis justo, tempor vitae pulvinar vel, pretium non arcu.
Cras ut est felis, eu consectetur lorem.
Sed suscipit aliquam dui, id dignissim erat accumsan nec.
In risus diam, varius a gravida at, imperdiet sit amet mi.

> Praesent vitae purus ut libero tempus pulvinar.
Aliquam erat volutpat.
Praesent nec odio sit amet nisl viverra tempor ac sit amet leo.
Cras libero tellus, vulputate ac placerat nec, auctor at erat.
Sed ante orci, gravida vel vulputate non, convallis eu urna.
Morbi lacus nisi, accumsan ut imperdiet ac, auctor a lorem.
Vestibulum venenatis, risus eu cursus elementum, diam magna cursus turpis, quis malesuada arcu lectus malesuada nisl.

##Nunc purus est, tristique ut interdum vitae, iaculis non mi.
Sed at mauris a magna bibendum feugiat non quis elit.
Maecenas tempor, nibh quis aliquam suscipit, libero risus porttitor tellus, ut ornare velit lorem in velit.
In vitae dui vitae lectus sodales tristique sit amet et quam.
Pellentesque molestie ultrices urna, quis auctor nibh hendrerit nec.
Suspendisse ultrices ante sed dui rhoncus sed tincidunt ante consequat.
Mauris sodales viverra ullamcorper.
Fusce consequat lectus sed turpis vestibulum vestibulum.
Aliquam erat volutpat.
Aliquam et dolor quis nisi elementum tempus.
Proin lobortis, nibh non fermentum pharetra, mi lorem imperdiet arcu, nec semper dolor est non neque.

	// Example 1
	try {
	    $o = new TestException(TestException::THROW_CUSTOM);
	} catch (MyException $e) {      // Will be caught
	    echo "Caught my exception\n", $e;
	    $e->customFunction();
	} catch (Exception $e) {        // Skipped
	    echo "Caught Default Exception\n", $e;
	}

##Nulla placerat magna a ante feugiat sit amet elementum ante commodo.
Sed porttitor ullamcorper ultrices.
Nullam nec turpis in sapien porta pulvinar.
Donec at malesuada justo.
Donec sed elit vitae sem vehicula ullamcorper.
Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
Fusce mollis placerat nibh a tincidunt.
Integer ultrices urna id massa fermentum aliquam venenatis lectus laoreet.
Pellentesque ac mattis eros.
Pellentesque vitae urna enim.
Nunc sodales, erat ut tempus malesuada, diam mi accumsan mauris, id consectetur ante quam vel tortor.
Sed odio quam, auctor mollis ultrices non, varius eu leo.
Vivamus dui eros, dignissim eu sollicitudin sed, blandit scelerisque elit.
Phasellus eu elit nisi.
Cras ac velit metus, nec congue nibh.
Quisque sit amet leo vel orci semper placerat.
