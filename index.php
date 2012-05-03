<ul id="tourDateList">
	<?php
		// load SimpleXML http://www.phpfreaks.com/tutorial/handling-xml-data
		// $shows = new SimpleXMLElement('http://feeds.artistdata.com/xml.shows/artist/AR-D230E8BEDA5A6F37/xml/future', null, true);
							
	// XML FEED BEING PULLED FROM ARTISTDATA USING A CRON JOB (SET UP ON GODADDY)
	$shows = new SimpleXMLElement('http://feeds.artistdata.com/xml.shows/artist/AR-D230E8BEDA5A6F37/xml/future', null, true); 

	foreach($shows as $show) // loop through our books
	{
								
		// DISPLAYING THE MONTHLY HEADING ON THE SHOW LISTING
		$master_date_format = "mY"; //or something else that date() accepts as a format
		$master_display_date = date_format(date_create(($show->date)), $master_date_format);
		$master_display_date_display = date_format(date_create(($show->date)), 'M Y');
		if ( $master_display_date != $master_display_date_old) {
			echo "<li class='dateHeader $master_display_date'>$master_display_date_display</li>";
		}
								
		// Getting Variable from XML and changing them into provence/state codes (reduce space)
		if(($show->state) != "" AND ($show->country) == "Canada")
		{

			if(	
				// CANADIAN PROVENCES
				($show->state)  == "Ontario") 				{ $display_state = 'ON'; } elseif 
				(($show->state) == "Quebec") 				{ $display_state = 'QC'; } elseif 
				(($show->state) == "Nova Scotia")			{ $display_state = 'NS'; } elseif 
				(($show->state) == "New Brunswick")			{ $display_state = 'NB'; } elseif 
				(($show->state) == "Manitoba")				{ $display_state = 'MB'; } elseif 
				(($show->state) == "British Columbia")		{ $display_state = 'BC'; } elseif 
				(($show->state) == "Prince Edward")			{ $display_state = 'PE'; } elseif 
				(($show->state) == "Saskatchewan")			{ $display_state = 'SK'; } elseif 
				(($show->state) == "Alberta")				{ $display_state = 'AB'; } elseif 
				(($show->state) == "Nunavut")				{ $display_state = 'NU'; } elseif 
				(($show->state) == "Newfoundland")			{ $display_state = 'NL'; }

		} elseif (($show->state) != "" AND ($show->country) == "United States") {
			if(	
				// AMERICAN STATES
				($show->state) == "Alabama")				{ $display_state = 'AL'; } elseif
				(($show->state) == "Alaska")				{ $display_state = 'AK'; } elseif
				(($show->state) == "Arizona")				{ $display_state = 'AZ'; } elseif
				(($show->state) == "Arkansas")				{ $display_state = 'AR'; } elseif
				(($show->state) == "California")			{ $display_state = 'CA'; } elseif
				(($show->state) == "Colorado")				{ $display_state = 'CO'; } elseif
				(($show->state) == "Connecticut")			{ $display_state = 'CT'; } elseif
				(($show->state) == "Delaware")				{ $display_state = 'DE'; } elseif
				(($show->state) == "Florida")				{ $display_state = 'FL'; } elseif
				(($show->state) == "Georgia")				{ $display_state = 'GA'; } elseif
				(($show->state) == "Hawaii")				{ $display_state = 'HI'; } elseif
				(($show->state) == "Idaho")					{ $display_state = 'ID'; } elseif
				(($show->state) == "Illinois")				{ $display_state = 'IL'; } elseif
				(($show->state) == "Indiana")				{ $display_state = 'IN'; } elseif
				(($show->state) == "Iowa")					{ $display_state = 'IA'; } elseif
				(($show->state) == "Kansas")				{ $display_state = 'KS'; } elseif
				(($show->state) == "Kentucky")				{ $display_state = 'KY'; } elseif
				(($show->state) == "Louisiana")				{ $display_state = 'LA'; } elseif
				(($show->state) == "Maine")					{ $display_state = 'ME'; } elseif
				(($show->state) == "Maryland")				{ $display_state = 'MD'; } elseif
				(($show->state) == "Massachusetts")			{ $display_state = 'MA'; } elseif
				(($show->state) == "Michigan")				{ $display_state = 'MI'; } elseif
				(($show->state) == "Minnesota")				{ $display_state = 'MN'; } elseif
				(($show->state) == "Mississippi")			{ $display_state = 'MS'; } elseif
				(($show->state) == "Missouri")				{ $display_state = 'MO'; } elseif
				(($show->state) == "Montana")				{ $display_state = 'MT'; } elseif
				(($show->state) == "Nebraska")				{ $display_state = 'NE'; } elseif
				(($show->state) == "Nevada")				{ $display_state = 'NV'; } elseif
				(($show->state) == "New Hampshire")			{ $display_state = 'NH'; } elseif
				(($show->state) == "New Jersey")			{ $display_state = 'NJ'; } elseif
				(($show->state) == "New Mexico")			{ $display_state = 'NM'; } elseif
				(($show->state) == "New York")				{ $display_state = 'NY'; } elseif
				(($show->state) == "North Carolina")		{ $display_state = 'NC'; } elseif
				(($show->state) == "North Dakota")			{ $display_state = 'ND'; } elseif
				(($show->state) == "Ohio")					{ $display_state = 'OH'; } elseif
				(($show->state) == "Oklahoma")				{ $display_state = 'OK'; } elseif
				(($show->state) == "Oregon")				{ $display_state = 'OR'; } elseif
				(($show->state) == "Pennsylvania")			{ $display_state = 'PA'; } elseif
				(($show->state) == "Rhode Island")			{ $display_state = 'RI'; } elseif
				(($show->state) == "South Carolina")		{ $display_state = 'SC'; } elseif
				(($show->state) == "South Dakota")			{ $display_state = 'SD'; } elseif
				(($show->state) == "Tennessee")				{ $display_state = 'TN'; } elseif
				(($show->state) == "Texas")					{ $display_state = 'TX'; } elseif
				(($show->state) == "Utah")					{ $display_state = 'UT'; } elseif
				(($show->state) == "Vermont")				{ $display_state = 'VT'; } elseif
				(($show->state) == "Virginia")				{ $display_state = 'VA'; } elseif
				(($show->state) == "Washington")			{ $display_state = 'WA'; } elseif
				(($show->state) == "West Virginia")			{ $display_state = 'WV'; } elseif
				(($show->state) == "Wisconsin")				{ $display_state = 'WI'; } elseif
				(($show->state) == "Wyoming")				{ $display_state = 'WY'; }

			// IF NONE OF THESE ARE HAPPENING JUST SHOW THE STATE
		} else { $display_state = "{$show->state}";	};

		/////////////
		// SETTING HOW WE WANT THE DATE
		$format = "M jS, Y"; //or something else that date() accepts as a format
		$display_date = date_format(date_create(($show->date)), $format);


		/////////////
		// CHECKING TO SEE IF ITS A FESTIVAL
		if(($show->showType) == "Festival / Fair") {
		// Setting the variable if its a festival or fair
			$smart_venue_fest_or_building = "{$show->name}";
		} else {
		// If it's not a festival or fair show the club
			$smart_venue_fest_or_building = "{$show->venueName}";
		};
								


		//
		// RUNNING THE LOOP
		//

		echo "<li><p>"; // OPEN THE LIST ITEM

		echo "$display_date - {$show->city} $display_state - $smart_venue_fest_or_building";

		if(($show->venueURI) != "" OR ($show->ticketURI) != "") {
			echo "<br />\n<span class='ticketLinks'>"; // PUTTING IN THE SURROUNDING SPAN TAG IF THE TICKET AND INFO LINK EXIST
		}

		if(($show->venueURI) != "") { // VENUE LINK
			echo "<a href='{$show->venueURI}' target='_blank' title='Venue information for {$show->venueName}'><small>GET INFO</small></a>";

			if(($show->venueURI) != "" AND ($show->ticketURI) != "") {
				echo " - "; // SEPPERATING THE TICKET AND VENUE LINK IF THEY BOTH EXIST
			}

			if(($show->ticketURI) != "") { // TICKET LINK
				echo "<a href='{$show->ticketURI}' target='_blank' title='Buy tickets for {$show->venueName} on $display_date'><small>BUY TICKETS</small></a>";
			};

			echo " - "; // SEPPERATING 
									
			echo "<a href='http://www.facebook.com/thereason?sk=events' target'_blank'><small>FACEBOOK</small></a>";

		} else {

			echo "<br />\n<span class='ticketLinks'><a href='http://www.facebook.com/thereason?sk=events' target'_blank'><small>FACEBOOK</small></a></span>";
									
		}
								

		if(!empty($show->ticketURI) OR !empty($show->venueURI)) {
			echo "</span>"; // CLOSING THE HOLDER TAG
		}

		echo "</p></li>\n\n"; // CLOSE THE LIST ITEM
								
								
		// Rolling over the Display date for the date header
		$master_display_date_old = $master_display_date;
	}

		// http://www.artistdata.com/us/developers/xml.php
		// AgeLimit
		// Artist
		// ArtistIdentifier
		// ArtistURL
		// City
		// Country
		// Date
		// DoorsTime
		// EventName
		// Genre
		// OtherArtist
		// OtherArtistURL
		// PartnerArtistIdentifier
		// ShowIdentifier
		// State
		// Status
		// TicketPrice
		// TicketPurchaseURL
		// Time
		// Venue
		// VenueAddress
		// VenuePhone
		// VenuePostalCode
		// VenueURL
	?>
	<li style="border:none;"><p style="text-align:center;"><small>More tour dates coming soon...</small></p></li>
</ul>
