function ifEmptyData(value) {
    if (_.isEmpty(value)) {
        return '-'
    } else {
        return value
    }
}

function trimString(value) {
    return _.truncate(value, { 'length': 100, 'separator': '...' })
}