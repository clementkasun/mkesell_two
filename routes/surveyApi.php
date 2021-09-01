<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TitleController;
use App\Http\Controllers\MobileController;
use App\Http\Controllers\ValuesController;
use App\Http\Controllers\MainTitleController;
use App\Http\Controllers\ParameterController;
use App\Http\Controllers\AttributesController;
use App\Http\Controllers\SurveyNameController;
use App\Http\Controllers\SurveyResultController;
use App\Http\Controllers\SurveySessionController;
use App\Http\Controllers\AttributParameterController;
use App\Http\Controllers\AttributeHierachyMappingController;
use App\Http\Controllers\SurveyViewController;
use App\Http\Controllers\SurveyStructureController;
use App\Http\Controllers\CategoryListController;
use App\Http\Controllers\CategoryElementController;

/*
  |--------------------------------------------------------------------------
  | API Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register API routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | is assigned the "api" middleware group. Enjoy building your API!
  |
 */

/*
 * survey title
 */


Route::get('/survey/titles', [TitleController::class, 'index']); // get all survey titles
Route::get('/survey/title/id/{id}', [TitleController::class, 'find']); // get a survey title by id
Route::get('/survey/title/attributes/id/{id}', [TitleController::class, 'attributes']); // get attributes of a given title id
Route::post('/survey/title', [TitleController::class, 'create']); // create a survey title
Route::put('/survey/title/id/{id}', [TitleController::class, 'update']); // update a survey title
Route::delete('/survey/title/id/{id}', [TitleController::class, 'delete']); // delete a survey title by id
Route::put('/survey/title/arrange/id/{id}', [TitleController::class, 'reArrange']); // update order

// Route::post('/survey/order', 'SurveyTitleController@updateOrder'); // update order
//  format  {"survey_title_name":"tikiri mole", "survey_title_status":1,"title_no":"3","main_title_id":"2"}
//format for order change
// {
//     "order": [
//         {
//             "titleID": "1",
//             "order": "1"
//         },
//         {
//             "titleID": "2",
//             "order": "2"
//         }
//     ]
// }
/*
 * Main title
 */

Route::get('/survey/main/titles/id/{id}', [MainTitleController::class, 'index']); // get all survey titles
//Route::get('/survey/main/titles', 'MainTitleController@index'); // get all survey titles
Route::get('/survey/main/title/id/{id}', [MainTitleController::class, 'subTitles']); // get a survey title by id
Route::get('/survey/main/title/subtitles/id/{id}', [MainTitleController::class, 'subTitles']); // get a survey title by id
Route::post('/survey/main/title', [MainTitleController::class, 'create']); // create a survey title
Route::put('/survey/main/title/id/{id}', [MainTitleController::class, 'update']); // update a survey title
Route::delete('/survey/main/title/id/{id}', [MainTitleController::class, 'destroy']); // delete a survey title by id
Route::post('/survey/order', 'MainTitleController@updateOrder'); // update order
// Route::get('/survey/main/title/subtitles/id/{id}', [MainTitleController::class, 'subTitles']); // get a survey title by id
Route::put('/survey/main/arrange/id/{id}', [MainTitleController::class, 'reArrange']); // update order

//  format  {"main_title_name":"tikiri mole", "main_title_status":1,"main_title_no":"3"}

//format for order change
// {
//     "order": [
//         
//             "titleID": "1",
//             "order": 
//         },
//         {
//             "titleID": "2",
//             "order": "2"
//         }
//     ]
// }

/*
 * Main title end
 */

/*
 * survey attribute
 */
Route::post('/survey/attribute', [AttributesController::class, 'create']); // create survey attribute
Route::get('/survey/attributes', [AttributesController::class, 'all']); // get all survey attributes
Route::get('/survey/attribute/id/{id}', [AttributesController::class, 'find']); // get a survey atttribute
Route::put('/survey/attribute/id/{id}', [AttributesController::class, 'update']); // update
Route::delete('/survey/attribute/id/{id}', [AttributesController::class, 'delete']); // delete
Route::get('/survey/attribute/title/id/{id}', [AttributesController::class, 'title']); // get attributes by title
Route::post('/survey/attribute/order', [AttributesController::class, 'updateOrder']); // update order
Route::put('/survey/attribute/arrange/id/{id}', [AttributesController::class, 'reArrange']); // update order
//{
//    "survey_attribute_name": "tikiri moleeee",
//    "survey_title_id":"3",
//    "title_no":"4"
//}
//format for order change
// {
//     "order": [
//         {
//             "attributeID": "1",
//             "order": "1"
//         },
//         {
//             "attributeID": "2",
//             "order": "2"
//         }
//     ]
// }

/*
 * survey attribute end
 */

/*
 * survey value
 */

Route::post('/survey/value', [ValuesController::class, 'create']); // create
Route::get('/survey/values/id/{id}', [ValuesController::class, 'all']); // get all values my map id
Route::get('/survey/value/id/{id}', [ValuesController::class, 'find']); // get one
Route::put('/survey/value/id/{id}', [ValuesController::class, 'update']); // update
Route::delete('/survey/value/id/{id}', [ValuesController::class, 'delete']); // delete
// {
//     "survey_value_name":"h1",
//     "suray_param_attributes_id":"3"
// }

/*
 * survey value end
 */

/*
 * survey Parameter
 */

Route::post('/survey/parameter', [ParameterController::class, 'create']); // create
Route::get('/survey/parameter', [ParameterController::class, 'all']); // get all
Route::get('/survey/parameter/assigned/title_id/{titleId}/attribute_id/{attributeID}', [ParameterController::class, 'assignedParameters']); // get assigned parameters for a given title id and attribute id
Route::get('/survey/parameter/assignedrow/title_id/{titleId}/attribute_id/{attributeID}', [ParameterController::class, 'assignedParametersrow']); // get assigned parameters for a given title id and attribute id
Route::get('/survey/parameter/unassigned/title_id/{titleId}/attribute_id/{attributeID}', [ParameterController::class, 'doesntAssignedParameters']); // get gitassigned parameters for a given title id and attribute id
Route::get('/survey/parameter/id/{id}', [ParameterController::class, 'find']); // get one
Route::put('/survey/parameter/id/{id}', [ParameterController::class, 'update']); // update
Route::delete('/survey/parameter/id/{id}', [ParameterController::class, 'delete']); // delete
Route::get('/survey/parameter/title/id/{id}', [ParameterController::class, 'title']); // get parameter by title
//{
//    "survey_parameter_name": "tikiri moleeeedddd",
//    "survey_title_id": "1"
//
//}

/*
 * survey Parameter atribute map
 *
 */

Route::post('/survey/attrpram_map', [AttributParameterController::class, 'create']); // create
Route::get('/survey/attrpram_map', [AttributParameterController::class, 'all']); // get all
Route::get('/survey/attrpram_map/id/{id}', [AttributParameterController::class, 'find']); // get one
Route::get('/survey/attrpram_map/parameter_id/{parameter_id}/survey_attribute_id/{survey_attribute_id}', [AttributParameterController::class, 'ids']); // get one
Route::put('/survey/attrpram_map/id/{id}', [AttributParameterController::class, 'update']); // update
Route::delete('/survey/attrpram_map/id/{id}', [AttributParameterController::class, 'delete']); // delete
Route::get('/survey/attrpram_map/title/id/{id}', [AttributParameterController::class, 'title']); // get parameter by title
Route::get('/survey/attrpram_map/types', [AttributParameterController::class, 'types']); // get survey types
Route::get('/survey/attrpram_map/values/id/{id}', [AttributParameterController::class, 'values']); // get values of a given attribute id
Route::get('/survey/attrpram_map/table/id/{id}', [AttributParameterController::class, 'table']); // get values of a given attribute id
Route::get('/survey/attrpram_map/attr/{id}', [AttributParameterController::class, 'assigned']); // get values of a given attribute id
Route::get('/survey/attrpram_map/attr_option/attribute_id/{attributeID}/session_id/{sessionId}', [AttributParameterController::class, 'assignedOption']); // get values of a given attribute id not in result table
// {
//     "survey_parameter_id":"1",
//     "survey_attribute_id":"1",
//     "type":"selected"
//     "is_null":0
//     "is_image":0
// }

/*
 * survey result
 */



Route::post('/survey/result', [SurveyResultController::class, 'create']); // create a result
Route::get('/survey/result/mapId/{id}', [SurveyResultController::class, 'all']); // get results by map id
Route::get('/survey/result/id/{id}', 'SurveyResultController@find'); // get result by id
Route::get('/survey/result/attributes/unsaved/session_id/{sessionID}/title_id/{titleId}', [SurveyResultController::class, 'attributesNotEntered']); // get unsaved attributes by session id and title id
Route::get('/survey/result/attributes/saved/session_id/{sessionID}/title_id/{titleId}', [SurveyResultController::class, 'attributesEntered']); // get saved attributes by session id and title id
Route::get('/survey/result/attribute_id/{attributeID}/session_id/{sessionID}', [SurveyResultController::class, 'results']); // get results by attribute_id and session_id
Route::put('/survey/result/id/{id}', [SurveyResultController::class, 'update']); // update
Route::delete('/survey/result/id/{id}', [SurveyResultController::class, 'dlete']); // delete
// {
//     "suray_param_attribute_id": "11",
//     "type": "NUMERIC",
//     "value": "10",
//     "survey_session_id" : "1"
// }

/*
 * survey sessions
 */



Route::post('/survey/session/start', [SurveySessionController::class, 'create']); // create a result
Route::patch('/survey/session/end/id/{id}', [SurveySessionController::class, 'end']); // end session
Route::patch('/survey/session/restart/id/{id}', [SurveySessionController::class, 'restart']); // restart session
Route::get('/survey/sessions', [SurveySessionController::class, 'index']); // get all
Route::get('/survey/session/id/{id}', [SurveySessionController::class, 'show']); // get titles by session id
Route::get('/survey/session/main/id/{id}', [SurveySessionController::class, 'showMain']); // get main titles by session id
Route::get('/survey/session/subTitle/session_id/{sessionId}/main_id/{mainId}', [SurveySessionController::class, 'showSubTitesByMainAndSessionID']); // get sub titles by session id and main title
Route::put('/survey/session/id/{id}', [SurveySessionController::class, 'update']); // update only name
Route::delete('/survey/session/id/{id}', [SurveySessionController::class, 'destroy']); // delete
//  {
//       "survey_name_id": "2",
//       "start_date": "2019-01-01",
//       "year": "1995",
//       "end_date": "2020-01-01"
//   }

/*
 * survey names
 */



Route::post('/survey/name', [SurveyNameController::class, 'create']); // create
Route::get('/survey/name', [SurveyNameController::class, 'index']); // view
Route::get('/survey/name/id/{id}', [SurveyNameController::class, 'show']); // show by one
Route::put('/survey/name/id/{id}', [SurveyNameController::class, 'update']); // update
Route::delete('/survey/name/id/{id}', [SurveyNameController::class, 'destroy']); //delete
Route::put('/survey/name/order', [SurveyNameController::class, 'updateOrder']); // order
Route::get('/survey/surveyname/id/{id}', [SurveyNameController::class, 'selectName']); // view
Route::put('/survey/nameupdate/id/{id}', [SurveyNameController::class, 'nameUpdate']); // view
//format for order change
// {
//   "name_id" : "3"
//     "order": [{
//             "1": "1",
//             "2": "2"
//             "4": "3"
//         }]
// }
//  {
//      "name": "Hansana",
//      "type": "1",
//      "titles":[1,2]
//  }



/*
 *  quistion mapping
 *  */

Route::post('/survey/mapping/create/', [AttributeHierachyMappingController::class, 'store']); // create mapping record
/* q_value,child_id,child_condition * */

Route::delete('/survey/mapping/delete/{id}', [AttributeHierachyMappingController::class, 'destroy']); // delete mapping record


Route::get('/survey/mapping/parameters/attribute/{id}', [AttributeHierachyMappingController::class, 'getCloseEndParameters']); // close end parameters
/* parameter=attribute id */


Route::get('/survey/mapping/mapped/attribute/{id}', [AttributeHierachyMappingController::class, 'getMappedAttributes']); // saved titiles
/* parameter=attribute id */



Route::get('/survey/mobile/survey/content/sent', [MobileController::class, 'sendDataStructure']); // send survey to mobile
/* parameter=attribute id */


Route::post('/survey/session/start', [SurveySessionController::class, 'create']); // create a result
Route::patch('/survey/session/end/id/{id}', [SurveySessionController::class, 'end']); // end session
Route::patch('/survey/session/restart/id/{id}', [SurveySessionController::class, 'restart']); // restart session
Route::get('/survey/sessions', [SurveySessionController::class, 'index']); // get all
Route::get('/survey/session/id/{id}', [SurveySessionController::class, 'show']); // get titles by session id
Route::get('/survey/session/main/id/{id}', [SurveySessionController::class, 'showMain']); // get main titles by session id
Route::get('/survey/session/subTitle/session_id/{sessionId}/main_id/{mainId}', [SurveySessionController::class, 'showSubTitesByMainAndSessionID']); // get sub titles by session id and main title
Route::put('/survey/session/id/{id}', [SurveySessionController::class, 'update']); // update only name
Route::delete('/survey/session/id/{id}', [SurveySessionController::class, 'destroy']); // delete


Route::post('/survey/name', [SurveyNameController::class, 'create']); // create
Route::get('/survey/name', [SurveyNameController::class, 'index']); // view
Route::get('/survey/name/id/{id}', [SurveyNameController::class, 'show']); // show by one
Route::put('/survey/name/id/{id}', [SurveyNameController::class, 'update']); // update
Route::delete('/survey/name/id/{id}', [SurveyNameController::class, 'destroy']); //delete
Route::put('/survey/name/order', [SurveyNameController::class, 'updateOrder']); // order


Route::get('/survey/view_structure/id/{id}', [SurveyViewController::class, 'surveySrtucture']); // show by one


Route::get('/survey/attribute_structure/id/{id}', [SurveyStructureController::class, 'viewSurveyAttributeOrder']); // view survey attribute order and structure

Route::get('/survey/category/all', [CategoryListController::class, 'getAllCategories']); // get category
Route::post('/survey/category/add', [CategoryListController::class, 'store']); // add category
Route::delete('/survey/category/remove/id/{id}', [CategoryListController::class, 'destroy']); // remove category
Route::get('/survey/category/by_parent/id/{id}/survey/id/{survey_id}', [CategoryListController::class, 'getCategoryByParentId']); // get category by perant id

Route::post('/survey/category_element/add', [CategoryElementController::class, 'store']); // add category element
Route::delete('/survey/category_element/delete/id/{id}', [CategoryElementController::class, 'destroy']); // delete category element
Route::get('/survey/category_elements/cat/{id}', [CategoryElementController::class, 'getAllElements']); // get elements
