import Library from "./components/LibraryComponent";
import AllCategory from "./components/AllCategoryComponent"


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
    },
    {
        path : '/all-category',
        name : 'all_category',
        component : AllCategory
    }
];
