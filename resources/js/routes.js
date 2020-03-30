import Library from "./components/LibraryComponent";


export const routes = [
    {
        path : '/library/:libraryId',
        name : 'library',
        component : Library,
        // props : true,
    },
    {
        path : '/home',
        name : 'my_library',
    }
];
