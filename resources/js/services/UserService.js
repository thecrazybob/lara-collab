export const getInitials = (name) => {
    if (!name.includes(" ")) {
        return name.slice(0, 2).toUpperCase();
    }
    const [firstname, lastname] = name.split(" ");

    if (!lastname) {
        return firstname.slice(0, 2).toUpperCase();
    }

    return (firstname[0] + lastname[0]).toUpperCase();
};