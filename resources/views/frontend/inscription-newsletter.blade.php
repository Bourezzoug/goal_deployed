@extends('layouts.frontend')
@section('content')
@section('title', 'Goal.ma - Newsletter inscription')
@include('frontend.components.headers')
<!-- component -->
<div class="fixed inset-0 bg-black opacity-80 z-[9999] header-overlay hidden " id="header-overlay"></div>

<div class="w-full">
    <div class=" h-80"></div>
    <div class="max-w-5xl mx-auto px-6 sm:px-6 lg:px-8 mb-12">
        <div class=" w-full   p-8 sm:p-12 -mt-72">
            <p class="text-3xl font-bold leading-7 text-center">S'inscrir à la <span class="text-white bg-main-color p-2 rounded  -skew-y-3 inline-block mt-3 sm:mt-0">newsletter</span></p>
            <form id="inscription-form" action="/inscription-newsletter" method="POST">
                @csrf
                <div class="md:flex items-center mt-12">
                    <div class="w-full md:w-1/2 flex flex-col md:my-0 my-3">
                        <h3 class="mb-2.5 font-semibold text-gray-900">Vous êtes?</h3>
                        <ul class="items-center w-3/4 lg:w-[420px] text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex">
                            <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r">
                                <div class="flex items-center pl-3">
                                    <input id="monsieur" type="radio" value="Monsieur" name="civilite" class="w-4 h-4  bg-gray-100 border-gray-300  focus:ring-main-color text-main-color" required>
                                    <label for="monsieur" class="w-full py-3 ml-2 text-sm font-medium text-gray-900">Monsieur </label>
                                </div>
                            </li>
                            <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r">
                                <div class="flex items-center pl-3">
                                    <input id="madam" type="radio" value="Madame" name="civilite" class="w-4 h-4  bg-gray-100 border-gray-300  focus:ring-main-color text-main-color">
                                    <label for="madam" class="w-full py-3 ml-2 text-sm font-medium text-gray-900">Madame</label>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="w-full md:w-1/2 flex flex-col">
                        <label class="font-semibold leading-none">Nom complet</label>
                        <input type="text" name="nom_complet" class="leading-none text-gray-900 p-3  mt-4 bg-gray-100 border rounded border-gray-200" required/>
                    </div>


                </div>
                <div class="md:flex items-center mt-12">
                    <div class="w-full md:w-1/2 flex flex-col">
                        <label class="font-semibold leading-none">Email</label>
                        <input type="email" name="email" class="leading-none text-gray-900 p-3 mt-4 bg-gray-100 border rounded border-gray-200" required/>
                        <div id="email-error" class="text-red-500 text-sm"></div>
                    </div>

                    <div class="w-full md:w-1/2 flex flex-col md:ml-6 md:mt-0 mt-4">
                        <label class="font-semibold leading-none" id="age">Téléphone</label>
                        <input type="text" name="telephone" class="leading-none text-gray-900 p-3 mt-4 bg-gray-100 border rounded border-gray-200" pattern="[0-9]{10}" required/>
                        <div id="tel-error" class="text-red-500 text-sm"></div>
                    </div>
                </div>
                <div class="md:flex items-center mt-12">
                    <div class="w-full md:w-1/2 flex flex-col">
                        <label class="font-semibold leading-none">Ville</label>
                        <input type="text" name="ville" class="leading-none text-gray-900 p-3 focus:outline-none  mt-4 bg-gray-100 border rounded border-gray-200" required/>
                    </div>

                    <div class="w-full md:w-1/2 flex flex-col md:ml-6 md:mt-0 mt-4">
                        <label class="font-semibold leading-none" id="age">Age</label>
                        <select name="age" id="age" class="leading-none text-gray-900 p-3.5 focus:outline-none  mt-4 bg-gray-100 border rounded border-gray-200" required>
                            <option value="" readonly="true" hidden="true"
                            selected>Selectionner votre age</option>
                            <option value="18 - 25">18 - 25</option>
                            <option value="25 - 35">25 - 35</option>
                            <option value="35 - 45">35 - 45</option>
                            <option value="45+">45+</option>
                        </select>
                    </div>
                </div>
                <div class="md:flex items-center mt-12">
                    <div class="w-full md:w-1/2 flex flex-col">
                        <label class="font-semibold leading-none" id="fonction">Fonction</label>
                        <select name="fonction" id="fonction" class="leading-none text-gray-900 p-3.5 focus:outline-none  mt-4 bg-gray-100 border rounded border-gray-200" required>
                            <option value="" readonly="true" hidden="true"
                            selected>Selectionner votre fonction</option>
                            <option value="cadre_supérieur">Cadre Supérieur</option>
                            <option value="cadre">Cadre</option>
                            <option value="direction_general">Direction général</option>
                            <option value="profession_libérales">Profession Libérales</option>
                            <option value="assistante_de_diraction">Assistante de diraction</option>
                            <option value="etudiant(e)">Étudiant(e)</option>
                            <option value="retraite">Retraité</option>
                            <option value="employé(e)_de_bureau">Employé(e) de bureau</option>
                            <option value="femme_au_foyer">Femme au foyer</option>
                            <option value="autre">Autre</option>
                        </select>
                    </div>

                </div>
                <div class="md:flex flex-col  mt-12">

                    <div class="flex ">
                        <div class="flex items-center h-7">
                            <input id="condition" name="conditions" type="checkbox"  class="w-4 h-4 text-main-color bg-gray-100 border-gray-300 rounded focus:ring-main-color" required>
                        </div>
                        <div class="ml-2 text-base">
                            <label for="conditions" class="font-medium text-gray-900 ">J’ai lu et j’accepte <a href="#" class="text-red-600">la note légale de "Goal.ma"</a> , notamment la mention relative à la protection des données personnelles.</label>
                        </div>
                    </div>
                    <div class="flex mt-3">
                        <div class="flex items-center h-7">
                            <input id="newsgoal" name="newsgoal" type="checkbox"  class="w-4 h-4 text-main-color bg-gray-100 border-gray-300 rounded focus:ring-main-color" >
                        </div>
                        <div class="ml-2 text-base">
                            <label for="newsgoal" class="font-medium text-gray-900 ">J'accepte de recevoir la newsletter quotidienne Goal.ma.</label>
                        </div>
                    </div>
                    <div class="flex mt-3">
                        <div class="flex items-center h-7">
                            <input id="newspartenaire" name="newspartenaire" type="checkbox"  class="w-4 h-4 text-main-color bg-gray-100 border-gray-300 rounded   focus:ring-2 focus:ring-main-color" >
                        </div>
                        <div class="ml-2 text-base">
                            <label for="newspartenaire" class="font-medium text-gray-900">J'accepte de recevoir la newsletter des partenaires commerciaux de Wib Day.</label>
                        </div>
                    </div>
                    
                </div>

                <div class="flex items-center  w-full">
                    <button type="submit" class="mt-9 font-semibold leading-none text-white py-3 px-5 bg-main-color rounded hover:scale-110  transition-transform">
                        Envoyer
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@include('frontend.components.scrollUp')
@include('frontend.components.footers')
@endsection