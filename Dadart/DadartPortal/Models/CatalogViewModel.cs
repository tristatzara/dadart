using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using Dadart.BLL.Model.Catalog;

namespace DadartPortal.Models
{
    class CatalogViewModel
    {
        public CatalogViewModel()
        {
            ProductList = new List<Product>();
            ArtistList = new List<Artist>();
        }
        public List<Category> CategoryList { get; set; }
        public List<Product> ProductList { get; set; }
        public List<Artist> ArtistList { get; set; }
        public Product TodayProduct { get; set; }
        public Artist TodayArtist { get; set; }
    }
}
