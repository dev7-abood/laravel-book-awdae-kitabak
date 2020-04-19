import Library from "./components/LibraryComponent";
import AllCategory from "./components/AllCategoryComponent"
import books from "./components/BookComponent"

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
    },
    {
        path : '/book/:booksId',
        name : 'books',
        component : books
    }
];
