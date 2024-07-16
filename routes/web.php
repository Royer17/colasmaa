<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//Route::get('/login', 'Auth\LoginController@showLoginForm');

//SISTEMA COLAS-------

Route::group(["namespace" => "Colas", "middleware" => ["auth.personalized"]], function () {
    // Route::get('/', 'TicketController@index')->name('pages.home');
    Route::get('/', 'TicketController@index');
    Route::post('/', 'TicketController@create');
    
    // ventanilla
    Route::get('ventanilla', 'VentanillaController@index');
    Route::get('enespera', 'VentanillaController@enespera');
    Route::get('enatencion', 'VentanillaController@enatencion');
    Route::get('encierre', 'VentanillaController@encierre');

    // monitor
    Route::get('monitor', 'MonitorController@index');
    Route::get('monitorv2', 'MonitorController@indexv2');

    Route::get('monitorcarga', 'MonitorController@carga');
    Route::get('verificar', 'MonitorController@verificar');
    
    //Prueba
    Route::get('prueba', ['as' => 'prueba.index', 'uses' => 'PruebaController@index']);

});



//-------------------


Route::get('/panel',
    ['middleware' => ['guest'],
        'uses' => 'Auth\LoginController@showLoginForm']);

Route::post('/login', 'Auth\LoginController@authenticate');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

// Route::get('/', 'PageController@home')->name('pages.home');
// Route::prefix('distrito')->group(function(){
//     Route::get('historia', 'DistrictController@History')->name('pages.district.history');
//     Route::get('turismo', 'DistrictController@tourism');

// });

// Route::get('/municipalidad/funcionarios', 'MunicipalityController@officials_view');
// Route::get('/municipalidad/directorio', 'MunicipalityController@directory_view');
// Route::get('/municipalidad/planeamiento-y-organizacion', 'MunicipalityController@planning_and_organization_view');
// Route::get('/municipalidad/directivas', 'MunicipalityController@directives_view');
// Route::get('/municipalidad/galeria-de-fotos', 'MunicipalityController@photos_gallery_view');


// Route::prefix('municipalidad')->group(function(){
//     Route::get('mision-y-vision', 'MunicipalityController@missionVision')->name('pages.municipality.mission-vision');
//     Route::get('alcalde', 'MunicipalityController@mayor')->name('pages.municipality.mayor');
//     Route::get('concejo-municipal', 'MunicipalityController@cityCouncil')->name('pages.municipality.city-council');
//     Route::get('comisiones', 'MunicipalityController@commissions')->name('pages.municipality.commissions');
//     // Route::get('funcionarios', 'MunicipalityController@officials')->name('pages.municipality.officials');
//     Route::get('organigrama', 'MunicipalityController@organizationChart')->name('pages.municipality.organization-chart');
//     Route::get('directorio-telefonico', 'MunicipalityController@phoneBook')->name('pages.municipality.phone-book');
// });

// Route::prefix('modernizacion')->group(function(){
//     Route::get('tributos-municipales', 'ModernizationController@municipalTaxes')->name('pages.modernization.municipal-taxes');
//     Route::get('licencia-de-edificaciones', 'ModernizationController@buildingLicense')->name('pages.modernization.building-license');
//     Route::get('licencia-de-funcionamiento', 'ModernizationController@operatingLicense')->name('pages.modernization.operating-license');
//     Route::get('libro-de-reclamaciones', 'ModernizationController@complaintsBook')->name('pages.modernization.complaints-book');
// });

// Route::prefix('servicios-municipales')->group(function(){
//     Route::get('{slug}', 'ServiceController@get_view')->name('pages.services.citizen-security');

//     Route::get('seguridad-ciudadana', 'ServiceController@citizenSecurity')->name('pages.services.citizen-security');
//     Route::get('codisec', 'ServiceController@codisec')->name('pages.services.codisec');
//     Route::get('vaso-de-leche', 'ServiceController@glassOfMilk')->name('pages.services.glass-of-milk');
//     Route::get('demuna', 'ServiceController@demuna')->name('pages.services.demuna');
//     Route::get('deportes', 'ServiceController@sports')->name('pages.services.sports');
//     Route::get('registro-civil', 'ServiceController@civilRegistration')->name('pages.services.civil-registration');
//     Route::get('defensa-civil', 'ServiceController@civilDefense')->name('pages.services.civil-defense');
//     Route::get('itse', 'ServiceController@itse')->name('pages.services.itse');
//     Route::get('sisfoh', 'ServiceController@sisfoh')->name('pages.services.sisfoh');
// });

// //Route::get('/docgestion/{acronym}', 'InstitutionalDocumentController@get_view');
// Route::get('/favoritos/{slug}', 'InstitutionalDocumentController@get_view');
// Route::get('/enlaces/{slug}', 'InstitutionalDocumentController@get_view_links');

// Route::get('rendicion-de-cuentas', 'AccountabilityController@get_index');


// Route::prefix('normatividad')->group(function(){
//     Route::get('resoluciones-de-alcaldia', 'NormativityController@mayoralResolutions')->name('pages.normativity.mayoral-resolutions');
//     Route::get('resolutions-datatable', 'NormativityController@resolutions_datatable');
//     Route::get('last-documents-datatable', 'NormativityController@last_documents_datatable');
//     Route::get('/', 'NormativityController@allResolutions');


//     Route::get('decretos-de-alcaldia', 'NormativityController@mayoralDecrees')->name('pages.normativity.mayoral-decrees');
//     Route::get('ordenanzas-municipales', 'NormativityController@municipalOrdinances')->name('pages.normativity.municipal-ordinances');
//     Route::get('resoluciones-de-gerencia-municipal', 'NormativityController@municipalManagementResolutions')->name('pages.normativity.municipal-management-resolutions');
//     Route::get('acuerdos-de-concejo-municipal', 'NormativityController@municipalCouncilAgreements')->name('pages.normativity.municipal-council-agreements');
//     Route::get('otros-documentos', 'NormativityController@otherDocuments')->name('pages.normativity.other-documents');
// });
// Route::get('portal-de-transparencia', 'PageController@transparencyPortal')->name('pages.transparency-portal');
// Route::get('mesa_partes', 'PageController@virtualMpv')->name('pages.mesa_partes');
// Route::prefix('noticias')->group(function(){
//     Route::get('/', 'NewsController@index')->name('pages.news');
//     Route::get('/{slug}', 'NewsController@detail')->name('pages.news.detail');
// });

// Route::get('agenda', 'ScheduleController@index');

// Route::get('/videos', 'VideoController@index');


// Route::prefix('obras')->group(function(){
//     Route::get('/', 'WorksController@index')->name('pages.works');
//     Route::get('/{slug}', 'WorksController@detail')->name('pages.works.detail');
// });

// Route::prefix('comunicados')->group(function(){
//     Route::get('/', 'CommuniqueController@index');
//     Route::get('/{id}', 'CommuniqueController@detail');
// });

// Route::get('convocatoria', 'PageController@convocatoria_view');
// Route::get('convocatoria-datatable', 'ConvocatoriaController@datatable');

// Route::resource('news','newsController');

// //Route::resource('noticia','NoticiaController');

// Route::get('/hola', 'NoticiaController@index')->name('pages.noticias.index');

// Route::get('/hola2',function(){
//     return view('pages.noticias.index',[
//         'mensaje'=>'hola perros',
//         'html'=>'<h3> perrrrrros</h3>'

//     ]);
// });

Route::group(["namespace" => "Admin", "prefix" => "admin", "middleware" => ["auth.personalized"]], function () {

    Route::get('dashboard', 'HomeController@dashboard_view');
    Route::get('municipalidad', 'HomeController@municipality_view');

    //Route::get('noticias', 'PostController@view');

    //Gestión de Publicacion

    Route::get('/noticias', ['as' => 'datatable-publicaciones', 'uses' => 'PostsController@get_index']);
    Route::post('posts', 'PostsController@store');
    Route::put('posts/{id}', 'PostsController@update');
    Route::get('post/{id}', 'PostsController@show');
 
    //Route::put('publicar/{noticia_id}','PostsController@put_publicar');

    //Promocionar noticia
    //Route::put('posts/{id}/cover','PostsController@putCover');
    #Despublicar
    //Route::put('posts/{id}/not-publish', 'PostsController@updateNotPublish');
    #Publicar
    //Route::put('posts/{id}/publish','PostsController@updatePublish');

    #Delete
    Route::delete('posts/{id}', 'PostsController@delete');

    //Route::post('upload-posts-images-dropzone', 'PostsController@storeImage')->name('upload-posts-images');

    Route::get('/publicaciones-datatable', 'PostsController@get_datatable');

    //Obras
    Route::get('/obras', ['as' => 'datatable-publicaciones', 'uses' => 'WorksController@get_index']);
    Route::post('works', 'WorksController@store');
    Route::put('works/{id}', 'WorksController@update');
    Route::get('works/{id}', 'WorksController@show');

    Route::delete('works/{id}', 'WorksController@delete');
    Route::get('/works-datatable', 'WorksController@get_datatable');

    //Sliders
    Route::get('/sliders', ['as' => 'datatable-publicaciones', 'uses' => 'SliderController@get_index']);
    Route::post('slider', 'SliderController@store');
    Route::put('slider/{id}', 'SliderController@update');
    Route::get('slider/{id}', 'SliderController@show');

    Route::delete('slider/{id}', 'SliderController@delete');
    Route::get('/slider-datatable', 'SliderController@get_datatable');

    //Popups
    Route::get('/popups', ['as' => 'datatable-publicaciones', 'uses' => 'PopupController@get_index']);
    Route::post('popup', 'PopupController@store');
    Route::put('popup/{id}', 'PopupController@update');
    Route::get('popup/{id}', 'PopupController@show');

    Route::delete('popup/{id}', 'PopupController@delete');
    Route::get('/popup-datatable', 'PopupController@get_datatable');

    //Servicios
    Route::get('/servicios', ['as' => 'datatable-publicaciones', 'uses' => 'ServiceController@get_index']);
    Route::post('service', 'ServiceController@store');
    Route::put('service/{id}', 'ServiceController@update');
    Route::get('service/{id}', 'ServiceController@show');
    Route::delete('service/{id}', 'ServiceController@delete');
    Route::delete('service/{id}/file', 'ServiceController@delete_file');
    Route::get('/services-datatable', 'ServiceController@get_datatable');

    //Convocatorias
    Route::get('/convocatorias', ['as' => 'datatable-convocatorias', 'uses' => 'MwConvocaController@get_index']);
    Route::post('convocatoria', 'MwConvocaController@store');
    Route::put('convocatoria/{id}', 'MwConvocaController@update');
    Route::get('convocatoria/{id}', 'MwConvocaController@show');

    Route::delete('convocatoria/{id}', 'MwConvocaController@delete');
    Route::get('/convocatorias-datatable', 'MwConvocaController@get_datatable');

    //Resoluciones
    Route::get('/normas', ['as' => 'datatable-normas', 'uses' => 'NormaController@get_index']);
    Route::post('norma', 'NormaController@store');
    Route::put('norma/{id}', 'NormaController@update');
    Route::get('norma/{id}', 'NormaController@show');

    Route::delete('norma/{id}', 'NormaController@delete');
    Route::delete('norma/{id}/file', 'NormaController@delete_file');
    Route::get('/normas-datatable', 'NormaController@get_datatable');
        
    //Rendicion de cuentas
    Route::get('/rendicion-de-cuentas', ['as' => 'datatable-normas', 'uses' => 'AccountabilityController@get_index']);
    Route::post('accountability', 'AccountabilityController@store');
    Route::put('accountability/{id}', 'AccountabilityController@update');
    Route::get('accountability/{id}', 'AccountabilityController@show');
    
    Route::delete('accountability/{id}', 'AccountabilityController@delete');
    Route::get('/accountability-datatable', 'AccountabilityController@get_datatable');

    //Document types
    Route::get('/tipos-de-documento', ['as' => 'datatable-document-types', 'uses' => 'DocumentTypeController@get_index']);
    Route::post('document-type', 'DocumentTypeController@store');
    Route::put('document-type/{id}', 'DocumentTypeController@update');
    Route::get('document-type/{id}', 'DocumentTypeController@show');

    Route::delete('document-type/{id}', 'DocumentTypeController@delete');
    Route::get('/document-types-datatable', 'DocumentTypeController@get_datatable');

    //Videos
    Route::get('/videos', ['as' => 'datatable-videos', 'uses' => 'YoutubeController@get_index']);
    Route::post('video', 'YoutubeController@store');
    Route::put('video/{id}', 'YoutubeController@update');
    Route::get('video/{id}', 'YoutubeController@show');

    Route::delete('video/{id}', 'YoutubeController@delete');
    Route::get('/videos-datatable', 'YoutubeController@get_datatable');

    //documentos institucionales
    Route::get('/documentos-institucionales', ['as' => 'datatable-documentos-institucionales', 'uses' => 'InstitutionalDocumentController@get_index']);
    Route::post('institutional-document', 'InstitutionalDocumentController@store');
    Route::put('institutional-document/{id}', 'InstitutionalDocumentController@update');
    Route::get('institutional-document/{id}', 'InstitutionalDocumentController@show');

    Route::delete('institutional-document/{id}', 'InstitutionalDocumentController@delete');
    Route::get('/institutional-documents-datatable', 'InstitutionalDocumentController@get_datatable');



    //otros documentos importantes
    Route::get('/otros-documentos-importantes', ['as' => 'datatable-otros-documentos-importantes', 'uses' => 'LastDocumentController@get_index']);
    Route::post('last-document', 'LastDocumentController@store');
    Route::put('last-document/{id}', 'LastDocumentController@update');
    Route::get('last-document/{id}', 'LastDocumentController@show');

    Route::delete('last-document/{id}', 'LastDocumentController@delete');
    Route::get('/last-documents-datatable', 'LastDocumentController@get_datatable');
    
    Route::put('setting/{id}', 'SettingController@update');

    //Agenda
    Route::get('/agenda', ['as' => 'datatable-agenda', 'uses' => 'ScheduleController@get_index']);
    Route::post('schedule', 'ScheduleController@store');
    Route::put('schedule/{id}', 'ScheduleController@update');
    Route::get('schedule/{id}', 'ScheduleController@show');

    Route::delete('schedule/{id}', 'ScheduleController@delete');
    Route::get('/schedule-datatable', 'ScheduleController@get_datatable');

    //Concejo Municipal
    Route::get('/concejo-municipal', ['as' => 'datatable-concejo-municipal', 'uses' => 'CityCouncilController@get_index']);
    Route::post('city-council', 'CityCouncilController@store');
    Route::put('city-council/{id}', 'CityCouncilController@update');
    Route::get('city-council/{id}', 'CityCouncilController@show');

    Route::delete('city-council/{id}', 'CityCouncilController@delete');
    Route::get('/city-council-datatable', 'CityCouncilController@get_datatable');

    //Usuarios
    Route::get('/usuarios', ['as' => 'datatable-user', 'uses' => 'UserController@get_index']);
    Route::post('user', 'UserController@store');
    Route::put('user/{id}', 'UserController@update');
    Route::put('user/{id}/profile', 'UserController@update_profile');
    Route::post('/usuario/permisos', 'UserController@post_view_permissions');
    Route::get('/usuario/permisos', 'UserController@get_view_permissions');
    Route::post('/user/{id}/permissions', 'UserController@update_permissions');
    Route::get('user/{id}', 'UserController@show');

    Route::delete('user/{id}', 'UserController@delete');
    Route::get('/user-datatable', 'UserController@get_datatable');
    

    //Roles
    Route::get('/roles', ['as' => 'datatable-user', 'uses' => 'RoleController@get_index']);
    Route::post('role', 'RoleController@store');
    Route::put('role/{id}', 'RoleController@update');
    Route::get('role/{id}', 'RoleController@show');
    Route::post('/role/permisos', 'RoleController@post_view_permissions');
    Route::get('/role/permisos', 'RoleController@get_view_permissions');
    Route::delete('role/{id}', 'RoleController@delete');
    Route::post('/role/{id}/permissions', 'RoleController@update_permissions');
    Route::get('/role-datatable', 'RoleController@get_datatable');

    //Attencion
    Route::get('/atencion', ['as' => 'atencion-route', 'uses' => 'AtencionController@get_index']);
    
    //Comisiones
    Route::get('/comisiones', ['as' => 'datatable-comisiones', 'uses' => 'CommissionController@get_index']);
    Route::post('commission', 'CommissionController@store');
    Route::put('commission/{id}', 'CommissionController@update');
    Route::get('commission/{id}', 'CommissionController@show');

    Route::delete('commission/{id}', 'CommissionController@delete');
    Route::get('/commissions-datatable', 'CommissionController@get_datatable');

    Route::delete('content/{id}', 'ContentController@delete');

});

Route::get('/evo-calendar', function(){
    return view('pages.example');
});



