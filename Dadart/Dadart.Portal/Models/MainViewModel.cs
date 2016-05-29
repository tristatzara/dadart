using Dadart.BLL.Model.Catalog;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

namespace Dadart.Portal.Models
{
    public class MainViewModel
    {       
        public List<ProductView> ProductList { get; set; }

    }

    public class ProductView 
    {
        public Product Product { get; set; }
        public Artist Artist { get; set; } 
    }

  
}