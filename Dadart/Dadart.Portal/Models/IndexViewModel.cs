using Dadart.BLL.Model.Catalog;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

namespace Dadart.Portal.Models
{
    public class IndexViewModel
    {       
        public List<Product> ProductList { get; set; }
        public List<Artist> ArtistList { get; set; }
    }

  
}