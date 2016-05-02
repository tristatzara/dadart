using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using Dadart.BLL.Model.Catalog;

namespace DadartPortal.Models
{
    public  class HomeViewModel
    {
        public HomeViewModel()
        {
            ProdictList = new List<Product>();
            ArtistList = new List<Artist>();
        }

        public Product TodayProduct { get; set; }
        public List<Product> ProdictList { get; set; }
        public List<Artist> ArtistList { get; set; }
        public Artist TodayArtist { get; set; }
    }
}
