angular.module('mytcc')

.config(function($routeProvider, $locationProvider)
{
    $locationProvider.html5Mode(false);

    $routeProvider
    .when("/home", 
    {
        template: "/mytcc/alunos/oi",
        controller: "alunoController"
    })
    .when("/profile", 
    {
        template: "/pages/profile.html",
        controller: "ProfileCtrl"
    })
    .when("/newlist", 
    {
        templateUrl: "/pages/newlist.html",
        controller: "NewListCtrl"
    })
    .when("/userlists/:id", 
    {
        templateUrl: "/pages/userlists.html",
        controller: "UserListsCtrl"
    });
});