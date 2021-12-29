const PaginationUtil = {
  getPaginationObject (pagination = null) {
    return {
      currentPage: (pagination) ? pagination.current_page : 1,
      total: (pagination) ? pagination.total : 0,
      from: (pagination) ? pagination.from : 0,
      to: (pagination) ? pagination.to : 0,
      perPage: (pagination) ? pagination.per_page : 10
    }
  }
}

export default PaginationUtil
