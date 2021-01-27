function ifEmptyData(value) {
    if (_.isEmpty(value)) {
        return '-'
    } else {
        return _.truncate(value, { 'length': 75, 'separator': '...' })
    }
}

function trimString(value) {
    return _.truncate(value, { 'length': 75, 'separator': '...' })
}

function operationDownload(file) {
    if (_.isEmpty(file)) {
        return "-";
    } else {
        return "<a href='" + route('downloadOperationPlan', file) + "'><i class='far fa-download'></i></a>";
    }
}