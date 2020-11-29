<?php
/**
 * SCallback for the Schema organization type field.
 *
 * @package    CHCD_Plugin
 * @subpackage Admin\Partials\Field_Callbacks
 *
 * @since      1.0.0
 * @author     Greg Sweet <greg@ccdzine.com>
 */

namespace CHCD_Plugin\Admin\Partials\Field_Callbacks;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

$types = [

	// First option save null.
	null          => __( 'Select one&hellip;', chcd_plugin() :: DOMAIN ),
	'Airline'     => __( 'Airline', chcd_plugin() :: DOMAIN ),
	'Corporation' => __( 'Corporation', chcd_plugin() :: DOMAIN ),

	// Educational Organizations.
	'EducationalOrganization' => __( 'Educational Organization', chcd_plugin() :: DOMAIN ),
		'CollegeOrUniversity' => __( '— College or University', chcd_plugin() :: DOMAIN ),
		'ElementarySchool'    => __( '— Elementary School', chcd_plugin() :: DOMAIN ),
		'HighSchool'          => __( '— High School', chcd_plugin() :: DOMAIN ),
		'MiddleSchool'        => __( '— Middle School', chcd_plugin() :: DOMAIN ),
		'Preschool'           => __( '— Preschool', chcd_plugin() :: DOMAIN ),
		'School'              => __( '— School', chcd_plugin() :: DOMAIN ),

	'GovernmentOrganization'  => __( 'Government Organization', chcd_plugin() :: DOMAIN ),

	// Local Businesses.
	'LocalBusiness' => __( 'Local Business', chcd_plugin() :: DOMAIN ),
		'AnimalShelter' => __( '— Animal Shelter', chcd_plugin() :: DOMAIN ),

		// Automotive Businesses.
		'AutomotiveBusiness' => __( '— Automotive Business', chcd_plugin() :: DOMAIN ),
			'AutoBodyShop'     => __( '—— Auto Body Shop', chcd_plugin() :: DOMAIN ),
			'AutoDealer'       => __( '—— Auto Dealer', chcd_plugin() :: DOMAIN ),
			'AutoPartsStore'   => __( '—— Auto Parts Store', chcd_plugin() :: DOMAIN ),
			'AutoRental'       => __( '—— Auto Rental', chcd_plugin() :: DOMAIN ),
			'AutoRepair'       => __( '—— Auto Repair', chcd_plugin() :: DOMAIN ),
			'AutoWash'         => __( '—— Auto Wash', chcd_plugin() :: DOMAIN ),
			'GasStation'       => __( '—— Gas Station', chcd_plugin() :: DOMAIN ),
			'MotorcycleDealer' => __( '—— Motorcycle Dealer', chcd_plugin() :: DOMAIN ),
			'MotorcycleRepair' => __( '—— Motorcycle Repair', chcd_plugin() :: DOMAIN ),

		'ChildCare'            => __( '— Child Care', chcd_plugin() :: DOMAIN ),
		'Dentist'              => __( '— Dentist', chcd_plugin() :: DOMAIN ),
		'DryCleaningOrLaundry' => __( '— Dry Cleaning or Laundry', chcd_plugin() :: DOMAIN ),

		// Emergency Services.
		'EmergencyService' => __( '— Emergency Service', chcd_plugin() :: DOMAIN ),
			'FireStation'   => __( '—— Fire Station', chcd_plugin() :: DOMAIN ),
			'Hospital'      => __( '—— Hospital', chcd_plugin() :: DOMAIN ),
			'PoliceStation' => __( '—— Police Station', chcd_plugin() :: DOMAIN ),

		'EmploymentAgency' => __( '— Employment Agency', chcd_plugin() :: DOMAIN ),

		// Entertainment Businesses.
		'EntertainmentBusiness' => __( '— Entertainment Business', chcd_plugin() :: DOMAIN ),
			'AdultEntertainment' => __( '—— Adult Entertainment', chcd_plugin() :: DOMAIN ),
			'AmusementPark'      => __( '—— Amusement Park', chcd_plugin() :: DOMAIN ),
			'ArtGallery'         => __( '—— Art Gallery', chcd_plugin() :: DOMAIN ),
			'Casino'             => __( '—— Casino', chcd_plugin() :: DOMAIN ),
			'ComedyClub'         => __( '—— Comedy Club', chcd_plugin() :: DOMAIN ),
			'MovieTheater'       => __( '—— Movie Theater', chcd_plugin() :: DOMAIN ),
			'NightClub'          => __( '—— Night Club', chcd_plugin() :: DOMAIN ),

		// Financial Services.
		'FinancialService' => __( '— Financial Service', chcd_plugin() :: DOMAIN ),
			'AccountingService' => __( '—— Accounting Service', chcd_plugin() :: DOMAIN ),
			'AutomatedTeller'   => __( '—— Automated Teller', chcd_plugin() :: DOMAIN ),
			'BankOrCreditUnion' => __( '—— Bank or Credit Union', chcd_plugin() :: DOMAIN ),
			'InsuranceAgency'   => __( '—— Insurance Agency', chcd_plugin() :: DOMAIN ),

		// Food Establishments.
		'FoodEstablishment' => __( '— Food Establishment', chcd_plugin() :: DOMAIN ),
			'Bakery'             => __( '—— Bakery', chcd_plugin() :: DOMAIN ),
			'BarOrPub'           => __( '—— Bar or Pub', chcd_plugin() :: DOMAIN ),
			'Brewery'            => __( '—— Brewery', chcd_plugin() :: DOMAIN ),
			'CafeOrCoffeeShop'   => __( '—— Cafe or Coffee Shop', chcd_plugin() :: DOMAIN ),
			'FastFoodRestaurant' => __( '—— Fast Food Restaurant', chcd_plugin() :: DOMAIN ),
			'IceCreamShop'       => __( '—— Ice Cream Shop', chcd_plugin() :: DOMAIN ),
			'Restaurant'         => __( '—— Restaurant', chcd_plugin() :: DOMAIN ),
			'Winery'             => __( '—— Winery', chcd_plugin() :: DOMAIN ),

		// Government Offices.
		'GovernmentOffice' => __( '— Government Office', chcd_plugin() :: DOMAIN ),
			'PostOffice' => __( '—— Post Office', chcd_plugin() :: DOMAIN ),

		// Health and Beauty Businesses.
		'HealthAndBeautyBusiness' => __( '— Health and Beauty Business', chcd_plugin() :: DOMAIN ),
			'BeautySalon'  => __( '—— Beauty Salon', chcd_plugin() :: DOMAIN ),
			'DaySpa'       => __( '—— Day Spa', chcd_plugin() :: DOMAIN ),
			'HairSalon'    => __( '—— Hair Salon', chcd_plugin() :: DOMAIN ),
			'HealthClub'   => __( '—— Health Club', chcd_plugin() :: DOMAIN ),
			'NailSalon'    => __( '—— Nail Salon', chcd_plugin() :: DOMAIN ),
			'TattooParlor' => __( '—— Tattoo Parlor', chcd_plugin() :: DOMAIN ),

		// Home and Construction Businesses.
		'HomeAndConstructionBusiness' => __( '— Home and Construction Business', chcd_plugin() :: DOMAIN ),
			'Electrician'       => __( '—— Electrician', chcd_plugin() :: DOMAIN ),
			'GeneralContractor' => __( '—— General Contractor', chcd_plugin() :: DOMAIN ),
			'HVACBusiness'      => __( '—— HVAC Business', chcd_plugin() :: DOMAIN ),
			'HousePainter'      => __( '—— House Painter', chcd_plugin() :: DOMAIN ),
			'Locksmith'         => __( '—— Locksmith', chcd_plugin() :: DOMAIN ),
			'MovingCompany'     => __( '—— MovingCompany', chcd_plugin() :: DOMAIN ),
			'Plumber'           => __( '—— Plumber', chcd_plugin() :: DOMAIN ),
			'RoofingContractor' => __( '—— Roofing Contractor', chcd_plugin() :: DOMAIN ),

		'InternetCafe' => __( '— Internet Cafe', chcd_plugin() :: DOMAIN ),

		// Legal Services.
		'LegalService' => __( '— Legal Service', chcd_plugin() :: DOMAIN ),
			'Attorney' => __( '—— Attorney', chcd_plugin() :: DOMAIN ),
			'Notary'   => __( '—— Notary', chcd_plugin() :: DOMAIN ),

		'Library' => __( '— Library', chcd_plugin() :: DOMAIN ),

		// Lodging Businesses.
		'LodgingBusiness' => __( '— Lodging Business', chcd_plugin() :: DOMAIN ),
			'BedAndBreakfast' => __( '—— Bed and Breakfast', chcd_plugin() :: DOMAIN ),
			'Campground'      => __( '—— Campground', chcd_plugin() :: DOMAIN ),
			'Hostel'          => __( '—— Hostel', chcd_plugin() :: DOMAIN ),
			'Hotel'           => __( '—— Hotel', chcd_plugin() :: DOMAIN ),
			'Motel'           => __( '—— Motel', chcd_plugin() :: DOMAIN ),
			'Resort'          => __( '—— Resort', chcd_plugin() :: DOMAIN ),

		'ProfessionalService' => __( '— Professional Service', chcd_plugin() :: DOMAIN ),
		'RadioStation'        => __( '— Radio Station', chcd_plugin() :: DOMAIN ),
		'RealEstateAgent'     => __( '— Real Estate Agent', chcd_plugin() :: DOMAIN ),
		'RecyclingCenter'     => __( '— Recycling Center', chcd_plugin() :: DOMAIN ),
		'SelfStorage'         => __( '— Self Storage', chcd_plugin() :: DOMAIN ),
		'ShoppingCenter'      => __( '— Shopping Center', chcd_plugin() :: DOMAIN ),

		// Sports Activity Locations.
		'SportsActivityLocation' => __( '— Sports Activity Location', chcd_plugin() :: DOMAIN ),
			'BowlingAlley'       => __( '—— Bowling Alley', chcd_plugin() :: DOMAIN ),
			'ExerciseGym'        => __( '—— Exercise Gym', chcd_plugin() :: DOMAIN ),
			'GolfCourse'         => __( '—— Golf Course', chcd_plugin() :: DOMAIN ),
			'HealthClub'         => __( '—— Health Club', chcd_plugin() :: DOMAIN ),
			'PublicSwimmingPool' => __( '—— Public Swimming Pool', chcd_plugin() :: DOMAIN ),
			'SkiResort'          => __( '—— Ski Resort', chcd_plugin() :: DOMAIN ),
			'SportsClub'         => __( '—— Sports Club', chcd_plugin() :: DOMAIN ),
			'StadiumOrArena'     => __( '—— Stadium or Arena', chcd_plugin() :: DOMAIN ),
			'TennisComplex'      => __( '—— Tennis Complex', chcd_plugin() :: DOMAIN ),

		// Store types.
		'Store' => __( '— Store', chcd_plugin() :: DOMAIN ),
			'AutoPartsStore'      => __( '—— Auto Parts Store', chcd_plugin() :: DOMAIN ),
			'BikeStore'           => __( '—— Bike Store', chcd_plugin() :: DOMAIN ),
			'BookStore'           => __( '—— Book Store', chcd_plugin() :: DOMAIN ),
			'ClothingStore'       => __( '—— Clothing Store', chcd_plugin() :: DOMAIN ),
			'ComputerStore'       => __( '—— Computer Store', chcd_plugin() :: DOMAIN ),
			'ConvenienceStore'    => __( '—— Convenience Store', chcd_plugin() :: DOMAIN ),
			'DepartmentStore'     => __( '—— Department Store', chcd_plugin() :: DOMAIN ),
			'ElectronicsStore'    => __( '—— Electronics Store', chcd_plugin() :: DOMAIN ),
			'Florist'             => __( '—— Florist', chcd_plugin() :: DOMAIN ),
			'FurnitureStore'      => __( '—— Furniture Store', chcd_plugin() :: DOMAIN ),
			'GardenStore'         => __( '—— Garden Store', chcd_plugin() :: DOMAIN ),
			'GroceryStore'        => __( '—— Grocery Store', chcd_plugin() :: DOMAIN ),
			'HardwareStore'       => __( '—— Hardware Store', chcd_plugin() :: DOMAIN ),
			'HobbyShop'           => __( '—— Hobby Shop', chcd_plugin() :: DOMAIN ),
			'HomeGoodsStore'      => __( '—— Home Goods Store', chcd_plugin() :: DOMAIN ),
			'JewelryStore'        => __( '—— Jewelry Store', chcd_plugin() :: DOMAIN ),
			'LiquorStore'         => __( '—— Liquor Store', chcd_plugin() :: DOMAIN ),
			'MensClothingStore'   => __( '—— Mens Clothing Store', chcd_plugin() :: DOMAIN ),
			'MobilePhoneStore'    => __( '—— Mobile Phone Store', chcd_plugin() :: DOMAIN ),
			'MovieRentalStore'    => __( '—— Movie Rental Store', chcd_plugin() :: DOMAIN ),
			'MusicStore'          => __( '—— Music Store', chcd_plugin() :: DOMAIN ),
			'OfficeEquipmentStore'=> __( '—— Office Equipment Store', chcd_plugin() :: DOMAIN ),
			'OutletStore'         => __( '—— Outlet Store', chcd_plugin() :: DOMAIN ),
			'PawnShop'            => __( '—— Pawn Shop', chcd_plugin() :: DOMAIN ),
			'PetStore'            => __( '—— Pet Store', chcd_plugin() :: DOMAIN ),
			'ShoeStore'           => __( '—— Shoe Store', chcd_plugin() :: DOMAIN ),
			'SportingGoodsStore'  => __( '—— Sporting Goods Store', chcd_plugin() :: DOMAIN ),
			'TireShop'            => __( '—— Tire Shop', chcd_plugin() :: DOMAIN ),
			'ToyStore'            => __( '—— Toy Store', chcd_plugin() :: DOMAIN ),
			'WholesaleStore'      => __( '—— Wholesale Store', chcd_plugin() :: DOMAIN ),

		'TelevisionStation'        => __( '— Television Station', chcd_plugin() :: DOMAIN ),
		'TouristInformationCenter' => __( '— Tourist Information Center', chcd_plugin() :: DOMAIN ),
		'TravelAgency'             => __( '— Travel Agency', chcd_plugin() :: DOMAIN ),

	'MedicalOrganization' => __( 'Medical Organization', chcd_plugin() :: DOMAIN ),
	'NGO'                 => __( 'NGO (Non-Governmental Organization', chcd_plugin() :: DOMAIN ),
	'PerformingGroup'     => __( 'Performing Group', chcd_plugin() :: DOMAIN ),
	'SportsOrganization'  => __( 'Sports Organization', chcd_plugin() :: DOMAIN )
];

$options = get_option( 'schema_org_type' );

$html = '<p><select id="schema_org_type" name="schema_org_type">';

foreach( $types as $type => $value ) {

	$selected = ( $options == $type ) ? 'selected="' . esc_attr( 'selected' ) . '"' : '';

	$html .= '<option value="' . esc_attr( $type ) . '" ' . $selected . '>' . esc_html( $value ) . '</option>';

}

$html .= '</select>';
$html .= sprintf(
	'<label for="schema_org_type"> %1s</label> <a href="%2s" target="_blank" class="tooltip" title="%3s"><span class="dashicons dashicons-editor-help"></span></a>',
	$args[0],
	esc_attr( esc_url( 'https://schema.org/docs/full.html#C.Organization' ) ),
	esc_attr( __( 'Read documentation for organization types', chcd_plugin() :: DOMAIN ) )
);
$html .= '</p>';

echo $html;