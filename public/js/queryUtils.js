var getId = (id) => {
    var start = id.lastIndexOf("-") + 1;
    return id.substring(start, id.length);
}