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
	null          => __( 'Select one&hellip;', 'chcd-plugin' ),
	'Airline'     => __( 'Airline', 'chcd-plugin' ),
	'Corporation' => __( 'Corporation', 'chcd-plugin' ),

	// Educational Organizations.
	'EducationalOrganization' => __( 'Educational Organization', 'chcd-plugin' ),
		'CollegeOrUniversity' => __( '— College or University', 'chcd-plugin' ),
		'ElementarySchool'    => __( '— Elementary School', 'chcd-plugin' ),
		'HighSchool'          => __( '— High School', 'chcd-plugin' ),
		'MiddleSchool'        => __( '— Middle School', 'chcd-plugin' ),
		'Preschool'           => __( '— Preschool', 'chcd-plugin' ),
		'School'              => __( '— School', 'chcd-plugin' ),

	'GovernmentOrganization'  => __( 'Government Organization', 'chcd-plugin' ),

	// Local Businesses.
	'LocalBusiness' => __( 'Local Business', 'chcd-plugin' ),
		'AnimalShelter' => __( '— Animal Shelter', 'chcd-plugin' ),

		// Automotive Businesses.
		'AutomotiveBusiness' => __( '— Automotive Business', 'chcd-plugin' ),
			'AutoBodyShop'     => __( '—— Auto Body Shop', 'chcd-plugin' ),
			'AutoDealer'       => __( '—— Auto Dealer', 'chcd-plugin' ),
			'AutoPartsStore'   => __( '—— Auto Parts Store', 'chcd-plugin' ),
			'AutoRental'       => __( '—— Auto Rental', 'chcd-plugin' ),
			'AutoRepair'       => __( '—— Auto Repair', 'chcd-plugin' ),
			'AutoWash'         => __( '—— Auto Wash', 'chcd-plugin' ),
			'GasStation'       => __( '—— Gas Station', 'chcd-plugin' ),
			'MotorcycleDealer' => __( '—— Motorcycle Dealer', 'chcd-plugin' ),
			'MotorcycleRepair' => __( '—— Motorcycle Repair', 'chcd-plugin' ),

		'ChildCare'            => __( '— Child Care', 'chcd-plugin' ),
		'Dentist'              => __( '— Dentist', 'chcd-plugin' ),
		'DryCleaningOrLaundry' => __( '— Dry Cleaning or Laundry', 'chcd-plugin' ),

		// Emergency Services.
		'EmergencyService' => __( '— Emergency Service', 'chcd-plugin' ),
			'FireStation'   => __( '—— Fire Station', 'chcd-plugin' ),
			'Hospital'      => __( '—— Hospital', 'chcd-plugin' ),
			'PoliceStation' => __( '—— Police Station', 'chcd-plugin' ),

		'EmploymentAgency' => __( '— Employment Agency', 'chcd-plugin' ),

		// Entertainment Businesses.
		'EntertainmentBusiness' => __( '— Entertainment Business', 'chcd-plugin' ),
			'AdultEntertainment' => __( '—— Adult Entertainment', 'chcd-plugin' ),
			'AmusementPark'      => __( '—— Amusement Park', 'chcd-plugin' ),
			'ArtGallery'         => __( '—— Art Gallery', 'chcd-plugin' ),
			'Casino'             => __( '—— Casino', 'chcd-plugin' ),
			'ComedyClub'         => __( '—— Comedy Club', 'chcd-plugin' ),
			'MovieTheater'       => __( '—— Movie Theater', 'chcd-plugin' ),
			'NightClub'          => __( '—— Night Club', 'chcd-plugin' ),

		// Financial Services.
		'FinancialService' => __( '— Financial Service', 'chcd-plugin' ),
			'AccountingService' => __( '—— Accounting Service', 'chcd-plugin' ),
			'AutomatedTeller'   => __( '—— Automated Teller', 'chcd-plugin' ),
			'BankOrCreditUnion' => __( '—— Bank or Credit Union', 'chcd-plugin' ),
			'InsuranceAgency'   => __( '—— Insurance Agency', 'chcd-plugin' ),

		// Food Establishments.
		'FoodEstablishment' => __( '— Food Establishment', 'chcd-plugin' ),
			'Bakery'             => __( '—— Bakery', 'chcd-plugin' ),
			'BarOrPub'           => __( '—— Bar or Pub', 'chcd-plugin' ),
			'Brewery'            => __( '—— Brewery', 'chcd-plugin' ),
			'CafeOrCoffeeShop'   => __( '—— Cafe or Coffee Shop', 'chcd-plugin' ),
			'FastFoodRestaurant' => __( '—— Fast Food Restaurant', 'chcd-plugin' ),
			'IceCreamShop'       => __( '—— Ice Cream Shop', 'chcd-plugin' ),
			'Restaurant'         => __( '—— Restaurant', 'chcd-plugin' ),
			'Winery'             => __( '—— Winery', 'chcd-plugin' ),

		// Government Offices.
		'GovernmentOffice' => __( '— Government Office', 'chcd-plugin' ),
			'PostOffice' => __( '—— Post Office', 'chcd-plugin' ),

		// Health and Beauty Businesses.
		'HealthAndBeautyBusiness' => __( '— Health and Beauty Business', 'chcd-plugin' ),
			'BeautySalon'  => __( '—— Beauty Salon', 'chcd-plugin' ),
			'DaySpa'       => __( '—— Day Spa', 'chcd-plugin' ),
			'HairSalon'    => __( '—— Hair Salon', 'chcd-plugin' ),
			'HealthClub'   => __( '—— Health Club', 'chcd-plugin' ),
			'NailSalon'    => __( '—— Nail Salon', 'chcd-plugin' ),
			'TattooParlor' => __( '—— Tattoo Parlor', 'chcd-plugin' ),

		// Home and Construction Businesses.
		'HomeAndConstructionBusiness' => __( '— Home and Construction Business', 'chcd-plugin' ),
			'Electrician'       => __( '—— Electrician', 'chcd-plugin' ),
			'GeneralContractor' => __( '—— General Contractor', 'chcd-plugin' ),
			'HVACBusiness'      => __( '—— HVAC Business', 'chcd-plugin' ),
			'HousePainter'      => __( '—— House Painter', 'chcd-plugin' ),
			'Locksmith'         => __( '—— Locksmith', 'chcd-plugin' ),
			'MovingCompany'     => __( '—— MovingCompany', 'chcd-plugin' ),
			'Plumber'           => __( '—— Plumber', 'chcd-plugin' ),
			'RoofingContractor' => __( '—— Roofing Contractor', 'chcd-plugin' ),

		'InternetCafe' => __( '— Internet Cafe', 'chcd-plugin' ),

		// Legal Services.
		'LegalService' => __( '— Legal Service', 'chcd-plugin' ),
			'Attorney' => __( '—— Attorney', 'chcd-plugin' ),
			'Notary'   => __( '—— Notary', 'chcd-plugin' ),

		'Library' => __( '— Library', 'chcd-plugin' ),

		// Lodging Businesses.
		'LodgingBusiness' => __( '— Lodging Business', 'chcd-plugin' ),
			'BedAndBreakfast' => __( '—— Bed and Breakfast', 'chcd-plugin' ),
			'Campground'      => __( '—— Campground', 'chcd-plugin' ),
			'Hostel'          => __( '—— Hostel', 'chcd-plugin' ),
			'Hotel'           => __( '—— Hotel', 'chcd-plugin' ),
			'Motel'           => __( '—— Motel', 'chcd-plugin' ),
			'Resort'          => __( '—— Resort', 'chcd-plugin' ),

		'ProfessionalService' => __( '— Professional Service', 'chcd-plugin' ),
		'RadioStation'        => __( '— Radio Station', 'chcd-plugin' ),
		'RealEstateAgent'     => __( '— Real Estate Agent', 'chcd-plugin' ),
		'RecyclingCenter'     => __( '— Recycling Center', 'chcd-plugin' ),
		'SelfStorage'         => __( '— Self Storage', 'chcd-plugin' ),
		'ShoppingCenter'      => __( '— Shopping Center', 'chcd-plugin' ),

		// Sports Activity Locations.
		'SportsActivityLocation' => __( '— Sports Activity Location', 'chcd-plugin' ),
			'BowlingAlley'       => __( '—— Bowling Alley', 'chcd-plugin' ),
			'ExerciseGym'        => __( '—— Exercise Gym', 'chcd-plugin' ),
			'GolfCourse'         => __( '—— Golf Course', 'chcd-plugin' ),
			'HealthClub'         => __( '—— Health Club', 'chcd-plugin' ),
			'PublicSwimmingPool' => __( '—— Public Swimming Pool', 'chcd-plugin' ),
			'SkiResort'          => __( '—— Ski Resort', 'chcd-plugin' ),
			'SportsClub'         => __( '—— Sports Club', 'chcd-plugin' ),
			'StadiumOrArena'     => __( '—— Stadium or Arena', 'chcd-plugin' ),
			'TennisComplex'      => __( '—— Tennis Complex', 'chcd-plugin' ),

		// Store types.
		'Store' => __( '— Store', 'chcd-plugin' ),
			'AutoPartsStore'      => __( '—— Auto Parts Store', 'chcd-plugin' ),
			'BikeStore'           => __( '—— Bike Store', 'chcd-plugin' ),
			'BookStore'           => __( '—— Book Store', 'chcd-plugin' ),
			'ClothingStore'       => __( '—— Clothing Store', 'chcd-plugin' ),
			'ComputerStore'       => __( '—— Computer Store', 'chcd-plugin' ),
			'ConvenienceStore'    => __( '—— Convenience Store', 'chcd-plugin' ),
			'DepartmentStore'     => __( '—— Department Store', 'chcd-plugin' ),
			'ElectronicsStore'    => __( '—— Electronics Store', 'chcd-plugin' ),
			'Florist'             => __( '—— Florist', 'chcd-plugin' ),
			'FurnitureStore'      => __( '—— Furniture Store', 'chcd-plugin' ),
			'GardenStore'         => __( '—— Garden Store', 'chcd-plugin' ),
			'GroceryStore'        => __( '—— Grocery Store', 'chcd-plugin' ),
			'HardwareStore'       => __( '—— Hardware Store', 'chcd-plugin' ),
			'HobbyShop'           => __( '—— Hobby Shop', 'chcd-plugin' ),
			'HomeGoodsStore'      => __( '—— Home Goods Store', 'chcd-plugin' ),
			'JewelryStore'        => __( '—— Jewelry Store', 'chcd-plugin' ),
			'LiquorStore'         => __( '—— Liquor Store', 'chcd-plugin' ),
			'MensClothingStore'   => __( '—— Mens Clothing Store', 'chcd-plugin' ),
			'MobilePhoneStore'    => __( '—— Mobile Phone Store', 'chcd-plugin' ),
			'MovieRentalStore'    => __( '—— Movie Rental Store', 'chcd-plugin' ),
			'MusicStore'          => __( '—— Music Store', 'chcd-plugin' ),
			'OfficeEquipmentStore'=> __( '—— Office Equipment Store', 'chcd-plugin' ),
			'OutletStore'         => __( '—— Outlet Store', 'chcd-plugin' ),
			'PawnShop'            => __( '—— Pawn Shop', 'chcd-plugin' ),
			'PetStore'            => __( '—— Pet Store', 'chcd-plugin' ),
			'ShoeStore'           => __( '—— Shoe Store', 'chcd-plugin' ),
			'SportingGoodsStore'  => __( '—— Sporting Goods Store', 'chcd-plugin' ),
			'TireShop'            => __( '—— Tire Shop', 'chcd-plugin' ),
			'ToyStore'            => __( '—— Toy Store', 'chcd-plugin' ),
			'WholesaleStore'      => __( '—— Wholesale Store', 'chcd-plugin' ),

		'TelevisionStation'        => __( '— Television Station', 'chcd-plugin' ),
		'TouristInformationCenter' => __( '— Tourist Information Center', 'chcd-plugin' ),
		'TravelAgency'             => __( '— Travel Agency', 'chcd-plugin' ),

	'MedicalOrganization' => __( 'Medical Organization', 'chcd-plugin' ),
	'NGO'                 => __( 'NGO (Non-Governmental Organization', 'chcd-plugin' ),
	'PerformingGroup'     => __( 'Performing Group', 'chcd-plugin' ),
	'SportsOrganization'  => __( 'Sports Organization', 'chcd-plugin' )
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
	esc_attr( __( 'Read documentation for organization types', 'chcd-plugin' ) )
);
$html .= '</p>';

echo $html;